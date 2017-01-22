<?php
	$thispage = "Resume drop";
	$title = "Resume drop";
	include 'includes/_top.php';
        $uploaddir = '/afs/acm.uiuc.edu/project/resume/drop/';
        $maxfile = 300000;   
?>

<br>

<?php

    if($_REQUEST[rp] == "1")
    {
        $uploaddir = $uploaddir.$rp_resume_upload_name;
    }else
    {
        $uploaddir = $uploaddir."hkn/";
    }
    
    $dir_handle = opendir($uploaddir);
    if(!$dir_handle)
    {
      mkdir($uploaddir);
      $dir_handle = opendir($uploaddir);
      if(!$dir_handle)
        quiterror("There is a problem.  Please contact the webmaster.");
    }
    closedir($dir_handle);

    $fail = 0;
    if($_REQUEST[email] == "")
    {
        quiterror("there was a problem.  Please contact the webmaster.");
    }
    if($_REQUEST[graddate] == "" || !preg_match("/[0-1][0-9]\-[0-9][0-9]/",
                                      $_REQUEST[graddate]))
    {
        adderror("You must specify a valid graduation date");
        $fail = 1;
    }
    if($_REQUEST[intern] == "" && $_REQUEST[coop] == "" && $_REQUEST[fulltime] == "")
    {
        adderror("You must specify the type of employment you are looking
        for.");
    }
    if($_FILES['resume']['tmp_name'] == "")
    {
        adderror("You must upload a resume.");
    }
    else
    {
        if(!preg_match("/\.(pdf|txt|doc)$/i", $_FILES['resume']['name'], $matches))
        {
            adderror("We only support pdfs, txts and doc formats.");
        }
        else
        {
            $ext = $matches[0];
        }
    }
                
    if($fail == 1)
    {
        quiterror("Please correct the above errors and try again.");
    }


    if($_REQUEST[intern] == "on")
    {
        $intern_file_name = $uploaddir."intern-$_REQUEST[graddate]-$_REQUEST[email]$ext";
        copy($_FILES['resume']['tmp_name'], $intern_file_name);
    }

    if($_REQUEST[coop] == "on")
    {
        $coop_file_name = $uploaddir."coop-$_REQUEST[graddate]-$_REQUEST[email]$ext";
        copy($_FILES['resume']['tmp_name'], $coop_file_name);
    }

    if($_REQUEST[fulltime] == "on")
    {
        $fulltime_file_name = $uploaddir."fulltime-$_REQUEST[graddate]-$_REQUEST[email]$ext";
        copy($_FILES['resume']['tmp_name'], $fulltime_file_name);
    }

    quiterror("We've successfully received your resume."); 
    ?>

<?php include 'includes/_bottom.php'; ?>
