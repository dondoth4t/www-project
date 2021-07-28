<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>COMP 3340 Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    ?>
<style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="zito.jpg" alt="Zito" style="width:100%">
      <div class="container">
        <h2>Zito Namuru</h2>
        <p class="title">CEO & Founder</p>
        <p>about urself.</p>
        <p>zito@example.com</p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="tyler.jpg" alt="Tyler" style="width:100%">
      <div class="container">
        <h2>Tyler Hong</h2>
        <p class="title">CEO & Founder </p>
        <p>about urself.</p>
        <p>tyler@example.com</p>
     
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="Karim.jpg" alt="Karim" style="width:100%">
      <div class="container">
        <h2>Karim Chahine</h2>
        <p class="title">CEO & Founder </p>
        <p>about urself.</p>
        <p>karimchahine2@hotmail.com</p>
   
      </div>
    </div>
  </div>
</div>

 <div class="column">
    <div class="card">
      <img src="Don.jpg" alt="Don" style="width:100%">
      <div class="container">
        <h2>Don</h2>
        <p class="title">CEO & Founder </p>
        <p>about urself.</p>
        <p>don@hotmail.com</p>
      
      </div>
    </div>
  </div>
</div>

</body>
</html>
