
        <div class="container-fluid" >
            <div class="panel-group" >
				<div class="panel panel-default" >
					<div class="panel-body">
                        <br>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <?php
                                    $link = site_url('index_admin/table_query');
                                    echo "<form id='f1' role='form' method='post' action='"."$link"."'>";
                                    ?>
                                    <?php if(isset($option)) : ?>
                                        <input type="hidden" name="table" id="table" value="$option">
                                    <?php else : ?>
                                        <input type="hidden" name="table" id="table" value="">
                                    <?php endif; ?>

                                    <label for="select_tabela">Table list:</label>
                                    <?php
                                    $sel_link = site_url('index_admin/select_table'); 
                                    echo "<select id='select_tabela' href='"."$sel_link"."' class='form-control'>";
                                        ?>
                                        <?php if($this->session->userdata('Privilegija') == 'a') :  ?>
                                            <?php if(isset($option)) : ?>
                                            <option value='moderator' <?=$option == 'moderator' ? 'selected="selected"' : '';?> >moderator</option>
                                            <option value='film' <?=$option == 'film' ? 'selected="selected"' : '';?> >film</option>
                                            <option value='komentar' <?=$option == 'komentar' ? 'selected="selected"' : '';?> >komentar</option>
                                            <option value='korisnik' <?=$option == 'korisnik' ? 'selected="selected"' : '';?> >korisnik</option>
                                            <option value='ocena' <?=$option == 'ocena' ? 'selected="selected"' : '';?> >ocena</option>
                                            <option value='projekcija' <?=$option == 'projekcija' ? 'selected="selected"' : '';?> >projekcija</option>
                                            <option value='rezervacija' <?=$option == 'rezervacija' ? 'selected="selected"' : '';?> >rezervacija</option>
                                            <option value='rezervisanoMesto' <?=$option == 'rezervisanoMesto' ? 'selected="selected"' : '';?> >rezervisanoMesto</option>
                                            <option value='sala' <?=$option == 'sala' ? 'selected="selected"' : '';?> >sala</option>
                                            <?php else : ?>
                                            <option value='moderator'>moderator</option>
                                            <option value='film'>film</option>
                                            <option value='komentar'>komentar</option>
                                            <option value='korisnik'>korisnik</option>
                                            <option value='ocena'>ocena</option>
                                            <option value='projekcija'>projekcija</option>
                                            <option value='rezervacija'>rezervacija</option>
                                            <option value='rezervisanoMesto'>rezervisanoMesto</option>
                                            <option value='sala'>sala</option>
                                            <?php endif; ?>
                                        <?php elseif($this->session->userdata('Privilegija') == 'k') : ?>
                                            <?php if(isset($option)) : ?>
                                            <option value='korisnik' <?=$option == 'korisnik' ? 'selected="selected"' : '';?> >korisnik</option>
                                            <option value='rezervacija' <?=$option == 'rezervacija' ? 'selected="selected"' : '';?> >rezervacija</option>
                                            <?php else : ?>
                                            <option value='korisnik'>korisnik</option>
                                            <option value='rezervacija'>rezervacija</option>
                                            <?php endif; ?>
                                        <?php elseif($this->session->userdata('Privilegija') == 'f') : ?>
                                            <?php if(isset($option)) : ?>
                                            <option value='film' <?=$option == 'film' ? 'selected="selected"' : '';?> >film</option>
                                            <option value='projekcija' <?=$option == 'projekcija' ? 'selected="selected"' : '';?> >projekcija</option>
                                            <?php else : ?>
                                            <option value='film'>film</option>
                                            <option value='projekcija'>projekcija</option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </form>
                            </div>
                        </div>
						<hr/>
                        
                        <div class='text-right'>
                        <?php
                            $s1 = site_url("index_admin/delete_row");
                            echo "<input id='for_delete' type='hidden' value='"."$s1"."'>";
                            $s2 = site_url("index_admin/edit_row");
                            echo "<input id='for_edit' type='hidden' value='"."$s2"."'>";
                            echo "<button id='insert-button' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-cog'></span> Insert</button>";
                        ?>
                        </div>
                        
                        <hr/>
                        <div id="deo-tabela">
                            <?php
                                if(isset($path)) {
                                    $this->load->view($path);
                                }
                            ?>
                        </div>
                        
					</div>
				</div>
			</div>
        </div>

        
       
