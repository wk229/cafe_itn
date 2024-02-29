<?php session_start();?>
<?php
include('h.php');
?>
<style type="text/css">
{
width:100%;
}
</style>
<div class="container" style="padding-top:100px">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="background-color:#D6EAF8">
      <h3 align="center">
      <span class="glyphicon glyphicon-lock"> </span>
      Form Login </h3>
      <form  name="formlogin" action="checklogin1.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="users" class="form-control" required placeholder="users" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="password" name="passwords" class="form-control" required placeholder="passwords" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" id="btn">
            <span class="glyphicon glyphicon-log-in"> </span>
             Login </button>
               <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
               </label>
            </div>
        </div>
      </form>
      <form  name="formlogin1" action="../index.html" method="POST" id="register" class="form-horizontal">
            <button type="submit" class="btn btn-success" id="btn">
            <span class="glyphicon glyphicon-log-in"> </span>
             Back </button></div></div></form>
    </div>
  </div>
</div>
