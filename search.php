<?php 
                                    
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM candidat WHERE CONCAT(NOM,PRENOM) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row2)
                                            {
                                                ?>
                                                <tr>
                                        <td><img class="rounded-circle me-2" width="30" height="30" src=<?php echo $row2['PHOTO']?>><?php echo $row2['NOM'] . " " . $row['PRENOM']?></td>
                                            <td> <?php echo $row2['MAIL']?></td>
                                            <td><?php echo $row2['FILIERE']?></td>
                                            <td><?php echo $row2['ANNEE']?></td>
                                            <td><?php echo $row2['ECOLE']?></td>
                                            <td><?php echo $row2['STATUS']?></td>
                                            <td class="d-xxl-flex justify-content-xxl-start align-items-xxl-center">
                                            <form action="student_modify.php" method="POST" class="d-inline">
                                                <button class="btn btn-success btn-sm" type="submit" name="accept_student" value=<?=$row2['id'];?> style="margin-right: 5px;"><i class="fa fa-check"></i></button>
                                                <button class="btn btn-danger btn-sm" type="submit" name="reject_student" value=<?=$row2['id'];?> style="margin-right: 5px;"><i class="fa fa-remove"></i></button>
                                                <a class="btn btn-warning btn-sm" href="student_view.php?id=<?= $row2['id']; ?>" style="margin-right: 5px;"><i class="far fa-eye"></i></a>
                                                <button class="btn btn-secondary btn-sm"  type="submit" name="delete_student" value=<?=$row2['MAIL'];?> ><i class="fa fa-trash"></i></button>
                                                </form>
                                        </td>
                                            
                                        </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>