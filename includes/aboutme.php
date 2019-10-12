
<?php
    include 'config/connect_db.php';

    $aboutMeSql = 'SELECT * FROM ABOUTME';
    // make query and get result
    $aboutMeResult = mysqli_query($conn, $aboutMeSql);
    //fetch the resulting rows as array
    $aboutMeArray = mysqli_fetch_all($aboutMeResult, MYSQLI_ASSOC);
    //free result from memory
    mysqli_free_result($aboutMeResult);
    //close conenction to database
    mysqli_close($conn);

    $aboutMe = $aboutMeArray[0];

    define('myName', $aboutMe['name']);
    define('myDateOfBirth', $aboutMe['dob']);
    define('myEmail', $aboutMe['email']);
    define('myPhone', $aboutMe['phone']);
    define('myWebsite', $aboutMe['website']);
    define('myAddress', $aboutMe['address']);
    define('myGithub', $aboutMe['github']);
    define('myLinkedin', $aboutMe['linkedin']);
    define('myInstagram', $aboutMe['instagram']);
    define('myTwitter', $aboutMe['twitter']);
    define('myPPH', $aboutMe['pph']);
    define('myReps', $aboutMe['reps']);
    define('myMozillians', $aboutMe['mozillians']);

?>
