   <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo  'index.php' ?>"><?php echo language("Homa Admin"); ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo "$_SERVER[PHP_SELF]?page=categories"; ?>"><?php echo language("Categories"); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo "$_SERVER[PHP_SELF]?page=items"; ?>"><?php echo language("Items"); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=<?php echo "$_SERVER[PHP_SELF]?page=users"; ?>><?php echo language("Members"); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=<?php echo "$_SERVER[PHP_SELF]?page=comments"; ?>><?php echo language("Comments"); ?></a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo language("Statistices"); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo language("Logs"); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href=<?php echo "$_SERVER[PHP_SELF]?page=users&sub=edit&userid=$_SESSION[ID]"; ?> ><i class='far fa-edit'></i> Edit Profile</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
          <a class="dropdown-item" href=<?php echo "$_SERVER[PHP_SELF]?page=logout"; ?> ><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    </ul>
<!--     <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>