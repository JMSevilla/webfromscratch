<?php

class postdataController { 
    
    public function create($data) {
        require_once "../database.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") { 
            $queryinsert = "insert into tbinformation values(default,  :fname, :lname, current_timestamp)";
            if($stmt = $pdo->prepare($queryinsert))
            { 
                $stmt->bindParam(":fname", $data['data1'], PDO::PARAM_STR);
                $stmt->bindParam(":lname", $data['data2'], PDO::PARAM_STR);
                if($stmt->execute())
                {
                    echo json_encode(array(
                        "statusCode" => 200
                    ));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
    public function fetchAll() { 
        //getall data
        require_once "../database.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") { 
            $fetchdata = "select * from tbinformation order by id desc";
            if($result = $pdo->query($fetchdata)) { 
                if($result->rowCount() > 0)
                {
                    while($row = $result->fetch())
                    {
                        echo '<tr>
                        <th scope="row">'.$row['id'].'</th>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['created_at'].'</td>
                        <td>
                        <button class="btn btn-primary">Modify</button>&nbsp;
                        <button class="btn btn-danger" onclick="ondelete('.$row['id'].')" >Delete</button>
                        </td>
                      </tr>';
                    }
                    unset($result);
                }
                
            }
            unset($pdo);
        }
    }
    public function destroy($id) { 
        require_once "../database.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") { 
            $destroyQuery = "delete from tbinformation where id=:id";
            if($stmt = $pdo->prepare($destroyQuery)) { 
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                if($stmt->execute()) { 
                    echo json_encode(array("statusCode" => 200));
                }
            }
        }
    }
}
