
<table style="width:100%; ">
							<thead>
							  <tr>
								<th style="width:10%;">Subject Code</th>
								<th style="width:10%;">Subject Title</th>
								<th style="width:10%;">Units</th>
								<th style="width:10%;">M</th>
								<th style="width:10%;">T</th>
								<th style="width:10%;">W</th>
								<th style="width:10%;">Th</th>
								<th style="width:10%;">F</th>
								<th style="width:10%;">Sat</th>
								<th style="width:10%;">Sun</th>
							  </tr>
							</thead>
							
		<?php
				
				$query=mysqli_query($con,"select distinct subject_code,subject_title,units from subject natural join time order by time_start")or die(mysqli_error());
					
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							  <tr >
								<td><?php echo $row['subject_code'];?></td>
								<td><?php echo $row['subject_title'];?></td>
								<td><?php echo $row['units'];?></td>
								<td><?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Monday' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Monday' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Monday' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											echo "<li class='$displayt'>$row1[time_id]</li>";
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								<td><?php 
									if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Tuesday' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Tuesday' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Tuesday' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}	
									?>
								</td>
								<td><?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Wednesday' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Wednesday' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Wednesday' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}		
									?>
								</td>
								<td><?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Thursday' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Thursday' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Thursday' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
										
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}		
									?>
								</td>
								<td>
									<?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Friday' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Friday' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Friday' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
										
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}		
									?>
								</td>

						<td>
							<?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Saturday' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Saturday' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Saturday' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}		
									?>
								</td>

								<td class="sec"> <?php 
								if ($member<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Sunday' and schedule.member_id='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($room<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Sunday' and schedule.room='$room' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								elseif ($class<>"")
								{
									$query1=mysqli_query($con,"select * from schedule natural join member where day='Sunday' and schedule.cys='$class' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
								
										$row1=mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['id'];
										if ($row1['remarks']<>" ")
											$displayrm= "<li>$row1[remarks]</li>";
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>
														<li class='options' style='display:$options'>
															<span style='float:left;'><a href='sched_edit.php?id=$id1' class='edit' title='Edit'>Edit</a></span>
																<span class='action'><a href='#' id='$id1' class='delete' title='Delete'>Remove</a></span>
														</li>";

											echo "<li class='showme'>";		
											
											echo "</li>";
											echo "<li class='$displayc'>$row1[cys]</li>";
											echo "<li class='$displaym'>$row1[member_last], $row1[member_first]</li>";											
											echo "<li class='$displayr'>Room $row1[room]</li>";
											echo $displayrm;
											echo "</ul>";
										}		
									?>
								</td>

		
								
							  </tr>
							
		<?php }?>					  
		</table>    

								
							
							
	