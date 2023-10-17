<?php
   include 'html/header.php';
   session_start();
   error_reporting(0)

?>

    <!-- the main page section -->
    <div class="main">
        <h1>To do list here</h1>
        <form action="" method="POST">
          <div class="containerlist">
              <div class="aboveinputsubmit">
                  <input type="text" name="listname" id="text" placeholder="Entrer ici la tache que vous voulez">
                  <button type="submit" name="submit">Ajouter<span>+</span></button>
              </div>
              <?php
              

            //   let's create a function to add list in php
            addList();
                function addList(){
                    
                        //let's tell the browser taht for each submit do the the following task 
                    if(isset($_POST["submit"])) {
                        // get the task
                        $tache = $_POST["listname"];
                        
                        // check if there is a session 
                        if(isset($_SESSION["list_task"])) {
                          // add the  task
                          $_SESSION["list_task"][] = $tache;
                        } else {
                          // Create new task and assign it to the current input
                          $_SESSION["list_task"] = array($tache);
                        }
                    }
                    if($_POST['listname']==''){
                        echo '<h2>You need to fill in the information of task</h2>';
                    }
                    // check if the list of task exist and it is not empty
                    if(isset($_SESSION["list_task"]) && !empty($_SESSION["list_task"])) {
                      echo "<h2>Liste des tâches :</h2>";
                      echo '<div class="bottomcontainer">';
                      
                      // go to the list of task and show it to the user
                      foreach($_SESSION["list_task"] as $tache) {
                        echo '<h4 class="task_here"><input type="checkbox" class="check"><span>' . $tache . '
                        </span><a href="delete.php?id=2 class="btn-danger">Delete</a></h4>';
                      }
                      
                      echo "</div>";
                      
                    }
                    
                }
                
                
              ?>

              <div class="moving">
                      <div class="hole1 hole">o</div>
                      <div class="hole2 hole">o</div>
                      <div class="hole3 hole">o</div>
              </div>

          </div>
        </form>
    </div>
<?php
    
    include 'html/footer.php';

?>