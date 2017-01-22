<?php

class MySqlDataSet
{
  public $rows;
  private $columns;
  private $table;
  private $conn;

  function __construct(MySqlConnection $conn, $table, $columns)
  {
    $this->rows = array(array());
    $this->columns = $columns;
    $this->conn = $conn;
    $this->table = $table;
  }

  function Scrape($fields)
  {
    if(count($this->rows) > 1)
      throw new Exception("Multiple rows in dataset");

    foreach($fields as $key => $value)
    {
      if(array_key_exists($key, $this->columns))
      {
        $this->rows[0][$key] = $value;
      }
    }
  }

  function Insert()
  {
    if(count($this->rows) > 1)
      throw new Exception("Multiple rows in dataset");

    $query = "INSERT INTO {$this->table} SET ";
    $query .= implode(" = ? , ", array_keys($this->rows[0]));
    $query .= " = ?";
    
    $q = $this->conn->prepare($query);

    call_user_func_array(array($q, "execute"), $this->rows[0]);
  }

  function Update($keycolumns)
  {
    $query = "UPDATE {$this->table} SET ";
    $query .= implode(" = ? , ", array_keys($this->columns));
    $query .= " = ? WHERE ";
    
    if(is_array($keycolumns))
    {
      $query .= implode(" = ? AND ", $keycolumns);
      $query .= " = ?";
    }
    else
    {
      $query .= $keycolumns . " = ?";
    }

    $q = $this->conn->prepare($query);

    foreach($this->rows as $row)
    {
      $values = array();
      foreach($row as $key => $value)
      {
        if(!is_numeric($key))
        {
          $values[] = $value;
        }
      }

      if(is_array($keycolumns))
      {
        foreach($keycolumns as $column)
        {
          $values[] = $row["$column"];
        }
      }
      else
      {
        $values[] = $row["$keycolumns"];
      }

      call_user_func_array(array($q, "execute"), $values);
    }
  }
}

class MySqlQuery
{
  private $conn;
  private $query;
  private $result;
  
  function __construct(MySqlConnection $connection, $querystring)
  {
    $this->conn = $connection;
    $this->query = $querystring;
    $this->result = NULL;
  }

  function __destruct()
  {
    if(!is_null($this->result))
    {
      mysql_free_result($this->result);
      $this->result = NULL;
    }
  }

  function getverb()
  {
    $parts = explode(' ', $this->query);
    return strtoupper($parts[0]);
  }

  function execute()
  {
    $cur_query = $this->query;
    if(!is_null($this->result))
    {
      mysql_free_result($this->result);
      $this->result = NULL;
    }
    
    foreach(func_get_args() as $arg)
    {
      if(!is_scalar($arg) and !is_null($arg))
        throw new Exception("Invalid argument");
      else if(is_null($arg))
      {
        $cur_query = preg_replace('/[^\\\\]\\?/', 'NULL', $cur_query, 1, $count);
        if($count < 1)
          throw new Exception("Argument count exceeds parameter count");
      }
      else if(is_numeric($arg))
      {
        $cur_query = preg_replace('/[^\\\\]\\?/', $arg, $cur_query, 1, $count);
        if($count < 1)
          throw new Exception("Argument count exceeds parameter count");
      }
      else if(is_bool($arg))
      {
        $cur_query = preg_replace('/[^\\\\]\\?/', ($arg ? 1 : 0), $cur_query, 1, $count);
        if($count < 1)
          throw new Exception("Argument count exceeds parameter count");
      }
      else 
      {
        if(ini_get('magic_quotes_gpc'))
        {
          $arg = stripslashes($arg);
        }
        
        $cur_query = preg_replace('/[^\\\\]\\?/', "'" . mysql_real_escape_string($arg, $this->conn->getHandle()) . "'",
            $cur_query, 1, $count);

        if($count < 1)
          throw new Exception("Argument count exceeds parameter count");
      }
    }

    if(preg_match('/[^\\\\]\\?/', $cur_query) > 0)
      throw new Exception("Parameter count exceeds argument count");

    $qret = mysql_query($cur_query, $this->conn->getHandle());

    if(is_resource($qret))
    {
      $this->result = $qret;
      return mysql_num_rows($this->result);
    }
    else if($qret == TRUE)
      return mysql_affected_rows($this->conn->getHandle());
    else
      throw new Exception("Error executing query: " . mysql_error());
  }

  function fetchrow_array()
  {
    if(is_null($this->result))
      throw new Exception("Result set is empty");
    
    $ret = mysql_fetch_array($this->result, MYSQL_BOTH);
    
    if($ret === FALSE)
    {
      mysql_free_result($this->result);
      $this->result = NULL;
    }

    return $ret;
  }

  function fetchrow_object()
  {
    if(is_null($this->result))
      throw new Exception("Result set is empty");
    
    $ret = mysql_fetch_object($this->result);
    
    if($ret === FALSE)
    {
      mysql_free_result($this->result);
      $this->result = NULL;
    }

    return $ret;
  }

  function fetchdataset()
  {
    $columns = array();
    while($column = mysql_fetch_field($this->result))
    {
      $columns[$column->name] = $column;
    }

    $parts = explode(' ', trim($this->query));
    switch($parts[0])
    {
      case "SELECT":
        foreach($parts as $part)
        {
          if($flag)
          {
            $table = $part;
            break;
          }
          else if(strtolower($part) == "from")
          {
            $flag = 1;
          }
        }
      break;
      case "UPDATE":
        $table = $parts[1];
      break;
      case "DELETE":
      case "REPLACE":
        $table = $parts[2];
      break;
      default:
        $table = $parts[1];
      break;
    }
    
    $ds = new MySqlDataSet($this->conn, $table, $columns);
    $ds->rows = array();

    while($row = $this->fetchrow_array())
    {
      $ds->rows[] = $row;
    }

    return $ds;
  }
}

class MySqlConnection
{
  private $conn;
  
  function __construct($host, $user, $pass, $database)
  {
    $this->conn = mysql_connect($host, $user, $pass);
    if($this->conn === FALSE)
      throw new Exception("Could not connect to database server");
    if(!mysql_select_db($database, $this->conn))
      throw new Exception("Could not select database");
  }

  function __destruct()
  {
    mysql_close($this->conn);
  }

  function prepare($query)
  {
    return new MySqlQuery($this, $query);
  }

  function getHandle()
  {
    return $this->conn;
  }
}
    
?>
