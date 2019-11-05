      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/images/avatar_2x.png'); ?>" alt="">
            </div>

            <div class="pull-left info">
              <p><?php echo $this->session->userdata("Av72Net_FullName"); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <ul class="sidebar-menu">
            <li class="header">Navigasi</li>
            <?php
              foreach ($PARENT_MENU as $ARR_PARENT_MENU) {
                if($ARR_PARENT_MENU["STATUS"] == "Single"){
                  $MENU = "<li>".
                            "<a href='".base_url($ARR_PARENT_MENU["URL"])."' id='$ARR_PARENT_MENU[ID]'>
                              <i class='$ARR_PARENT_MENU[ICON]'></i>
                              <span>$ARR_PARENT_MENU[NAME]</span>
                            </a>
                          </li>";
                  echo $MENU;
                }else{
                  if($ARR_PARENT_MENU["LEVEL"] == 2){
                    $MULTI_MENU = "<li class='treeview'>
                                    <a href='$ARR_PARENT_MENU[URL]' id='$ARR_PARENT_MENU[ID]'>
                                      <i class='$ARR_PARENT_MENU[ICON]'></i> <span>$ARR_PARENT_MENU[NAME]</span>
                                        <span class='pull-right-container'>
                                          <i class='fa fa-angle-left pull-right'></i>
                                        </span>
                                    </a>

                                    <ul class='treeview-menu'>";
                    foreach ($CHILD_MENU as $ARR_CHILD_MENU) {
                      if($ARR_CHILD_MENU["PARENT"] == $ARR_PARENT_MENU["ID"]){
                        $MULTI_MENU .= "<li>".
                                          "<a href='".base_url($ARR_CHILD_MENU["URL"])."' id='$ARR_CHILD_MENU[ID]'>
                                            <i class='$ARR_CHILD_MENU[ICON]'></i>
                                            <span>$ARR_CHILD_MENU[NAME]</span>
                                          </a>
                                        </li>";
                      }
                    }
                    $MULTI_MENU .= "</ul>";
                    echo $MULTI_MENU;
                  }else{
                    echo "<li>Error</li>";
                  }
                }
              }
            ?>
          </ul>
        </section>
      </aside>
