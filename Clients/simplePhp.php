 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rest API Client Side Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head> 
<body>
    <div class="container">
    <h2>Rest API Client Side Demo</h2> 
    <form class="form-inline" action="index.php" method="POST"> 
        <div class="form-group">
                <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Product Name" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
    <p>&nbsp;</p>
    <h3>
<?php

#
# A FAIRE POUR PRENDRE EN COMPTE LES TYPES DE REQUETES PUT / GET / POST / DELETE
#
        
if(isset($_POST['submit'])) { 
    $name =str_replace("+","%20",urlencode($_POST['name'])); // repmplacer les espace par %20
    
	$url = "http://localhost/TP1_RIA/WebServices/v1/apii/".$name; 
    $client = curl_init($url); 
    
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true); 
    //curl_setopt($client, CURLOPT_CUSTOMREQUEST, "PUT");
    $response = curl_exec($client); 
    
    $result = json_decode($response);
    if($result->status_message=="Product Found") {
        
        foreach($result->data as $value){
            echo $value . "<br>";
        }
    }else{
        echo $result->status_message;
    }
  
}
 
?> 
    </h3>
    </div>
</body>
</html>
