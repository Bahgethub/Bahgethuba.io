<?php 
$width="21%";
include("config.php");
include("fonctions.php");
if(!isset($_SESSION)) 
    {
	session_start();	
   } 

?> 

<!-- fin test -->			
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <!-- Core CSS - Include with every page --> 
	<link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	 <link href="../css/mystyle.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
	 <link href="../css/print_modal.css" rel="stylesheet" />
 <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap.min.css">
 <link rel="stylesheet" href="../DataTables/css/jquery.dataTables.css">
 <link rel="stylesheet" href="../DataTables/css/jquery.dataTables.min.css">

   </head>
<body>
<?php //include 'entete2.php';?>

        <!-- end navbar top -->
<?php //include 'mymenu.php';?>
        <!-- navbar side -->


        
        <!-- end navbar side -->
        <!--  page-wrapper -->
       </br>

            
   <!-- tester si l'utilisateur est connecté -->
            <?php
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("Location:../index.php");
                   }
                }
            ?>             

 <div class="col-lg-12">
<div class="row">
<br>
				 <div class="col-lg-3">
    <a href="AdminHome.php?deconnexion=true" role="button" data-toggle="modal" class="btn btn-primary btn-lg btn-block" > <i class="fa fa-sign-out fa-lg" ></i>&nbsp;&nbsp;Déconnexion</a>
    </div> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div class="col-lg-3">
    <a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary btn-lg btn-block" > <i class="fa fa-plus fa-lg" ></i>&nbsp;&nbsp;Nouveau Produit</a>
    </div>
	  <!--
 <div class="col-lg-3">
    <button class="btn btn-primary btn-lg btn-block" type="submit" id="btnExport" name='export' > <i class="fa fa-download fa-lg" ></i>&nbsp;&nbsp;Exporter la liste</button>
    </div>
	-->
	 </form>
	  <div class="col-lg-6">

	   </div>
	
	  </div>
	 




<div class="row"> <div class="col-lg-8"> <h2> <strong> <u>Liste de tous les produits disponible</u></strong></h2>  </div>  </div>
   <div class="col-md-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #EEE;">
                              <th>Id</th>
							<th>Title</th>
                            <th>Artist</th>
                            <th>Country</th>
							<th>Image1</th>
							<th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$myid=1;
                            //include ('connection.php');
                            $query = "SELECT * FROM produits ORDER BY id ASC";
							
					  if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
		  }
		   if(mysqli_num_rows($result) > 0)
    {
                            while($data= mysqli_fetch_assoc($result)) {
                                $id_produit="'".$data['id']."'";
								$path_image="'".$data['Path_image']."'";
								
                                echo '
                                    <tr>
                                        <td >'.$data['id'].'</td>
										<td>'.htmlspecialchars_decode($data['Title']).'</td> 
                                        <td>'.htmlspecialchars_decode($data['Artist']).'</td>
                                        <td>'.htmlspecialchars_decode($data['Country']).'</td>
				
                                        <td><img src='.htmlspecialchars_decode($data['Path_image']).' height="100" width="150"/></td>
                           
										<td width="7%"><a href="" data-toggle="modal" data-target="#modal_edit6" id="getEmployee8" data-id="'.$data['id'].'" title="éditer ce produit" data-toggle=""><i class="fa fa-pencil-square-o " ></i></a>&nbsp;&nbsp;&nbsp;<a href=""  onclick="delete_files('.$id_produit.','.$path_image.');" title="Supprimer ce produit"><i class="fa fa-trash-o" ></i></a>&nbsp;&nbsp;&nbsp;<a href="" data-toggle="modal" data-target="#view_patient" id="details_produits" data-id="'.$data['id'].'" title="Details sur le produit" ><i class="fa fa-info-circle"></i></a></td>
                                    </tr>
                                ';
							//$myid++;
                            }
				}			
                        ?>
                    </tbody>
                </table> 
  </div>            			 
     </div>





 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un nouveau Produit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method="post" action="actions.php" enctype="multipart/form-data">
			 <div class="form-group">
                <input type="text" name="Title" class="form-control" placeholder="Title">
            </div>
 <div class="form-group">
                <input type="text" name="Artist" class="form-control" placeholder="Artist">
            </div>
			<div class="form-group">
                <input type="text" name="Country" class="form-control" placeholder="Country">
            </div>
		
			 <div class="form-group">
       <label >Image Poster : </label>         
<input type="file" name="fileToUpload" id="fileToUpload">
            </div>       			
			 <div class="form-group">
                       <input type="hidden" name="act" value="ajout_produit" />					   
                    </div>
            <center><input type="submit" value="Enregister" name="SubmitButton" class="btn btn-primary btn-lg btn-block"></center>
			
           </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
        </div> 
      </div>
    </div>
  </div>
    


 <!-- The Modal -->
  








<div class="modal" id="modal_edit6">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">modifier les informations du produit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		<form method="post" action="actions.php">
         <div class="form-group">
                <input type="text" name="Title" id="Title2" class="form-control" placeholder="Title">
            </div>
 <div class="form-group">
                <input type="text" name="Artist" id="Artist2" class="form-control" placeholder="Artist">
            </div>
			<div class="form-group">
                <input type="text" name="Country" id="Country2" class="form-control" placeholder="Country">
            </div>
		
			 <div class="form-group">
       <label >Image Poster : </label>         
<input type="file" name="Upload_Image" id="Upload_Image">
            </div>       	   
			 <div class="form-group">
                       <input type="hidden" name="act" value="edit_produit" />
                        <input type="hidden" name="id" id="id2" />					   
                    </div>
            <center><input type="submit" value="Modifier" name="SubmitButton" class="btn btn-primary btn-lg btn-block"></center>
			
           </form> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
        </div> 
      </div>
    </div>
  </div>






<!-- view info formateur -->
    <div class="modal fade" id="view_patient" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Details sur le Produit</h4>
        </div>
        <div class="modal-body">
  <div class="row"> 
                     <div class="col-md-12">                         
                     <div class="table-responsive">                             
                     <table class="responstable">
					 <form>
					   <tr>
                     <th width="<?php echo $width; ?>" ><p align="left">Title :</p></th>
                     <td id="Title"></td>
                     </tr>
                     <tr>
                     <th width="<?php echo $width; ?>" > <p align="left">Artist :</p></th>
                     <td id="Artist"></td>
                     </tr>                                     
                                                            
                     <tr>
                     <th width="<?php echo $width; ?>"  > <p align="left">Country : </p></th>
                     <td id="Country"></td>
                     </tr>  
           		 
                     </table>                                
                     </div>                                       
                   </div> 
				    </form>
              </div> 	
		
    </div>
	  
        <div class="modal-footer">
            <div class="col-sm-offset-2 col-sm-8">
       <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
        </div>
		</div>
      </div>
    </div>
	  </div>



			 </div>
        </div>
        <!-- end page-wrapper -->
    </div>
	 <?php //include 'footer2.php';?> 
	  <script type="text/javascript" src="../js/jquery2.min.js"></script>
	  <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../DataTables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".table").DataTable({    
            });
        });
        
        
        function delete_files(id,path_image){
	 var agree=confirm("Etes-vous sur de vouloir supprimer ce patient ?");
if (agree)
{	
   $.ajax({
   url:"del_produit.php",
   method:"POST",
   data:{"id":id,"path_image":path_image},
   success:function(data)
   {
   alert(data);
   }
  });
  }
else 
{
 return false ;
}
}
</script>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
   
    	<script type="text/javascript" src="../js/edit_produit.js"></script>
	<script type="text/javascript" src="../js/Details_produit.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>



</body>

</html>
