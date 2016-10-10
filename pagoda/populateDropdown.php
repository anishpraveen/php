<?php
function populateQuestionDDL(){
              
                  require("connectionString.php"); 

                $sql = "SELECT iSL, cQuestion, cAnswer FROM qatable";
                $result = mysqli_query($conn, $sql);

                // set the resulting array to associative
                $result = mysqli_query($conn, $sql); 
               if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo "";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['iSL'] . "'>" . $row['cQuestion'] . "</option>";
                    }
                    echo "";
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
            }
function populateCategoryDDL(){
              
                   require("connectionString.php"); 
               
                $sql = "SELECT iSL, cCat FROM categoryList";
                $result = mysqli_query($conn, $sql);

                // set the resulting array to associative
                $result = mysqli_query($conn, $sql); 
               if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo "";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['iSL'] . "'>" . $row['cCat'] . "</option>";
                    }
                    echo "";
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
            }

?>