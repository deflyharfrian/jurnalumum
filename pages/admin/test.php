<div class="form-group">
                                <label for="exampleInputPassword1"> Kategori</label>
                                <select name="kategori" class="form-control" id="kategori">
                                <?  $sql_kategori = mysqli_query($con, "SELECT * FROM tb_kategori "); 
                                    while($data_kategori = mysqli_fetch_array($sql_kategori)){ ?> 
                                    <option value=""><?php echo $data_kategori[1];?>-</option>
                                    <? } ?>
                                </select> 
                            </div>    