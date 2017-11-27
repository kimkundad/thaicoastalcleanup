<div class="container" style="padding: 30px 0 60px;">
    <div class="row">
        <style type="text/css">
            
            .news-title {
                height: auto;
                font-size: 1.3em;
                margin-bottom: 8px;
            }
            .sidebar-tabing img {
                width: 260px;
                max-width: 260px;
                height: 190px;
            }
            .news-title a {

                font-size: 18px;

            }
           
            .media-body img {
                margin-left: 100px;
            }
            .btn-default {
                color: #795548;
                background-color: #fff;
                border-color: #795548;
            }
            .cat-item{
                padding: 8px;
            }
            .bullet {
                color: #fff;
                font-size: 16px;
                border-radius: 50%;
                width: 28px;
                height: 28px;
                background: #dcdcdc;
                text-align: center;
                padding: 2px;
                font-weight: 700;
                display: block;
                margin: 5px 8px 0px 0px;
                line-height: 1.5;
            }
            .tab-pane i {
                float: left;
            }
            .tab-pane li {
                padding: 8px 2px;
                overflow: hidden;
                border-bottom: 1px dotted #b5b5b5;
                line-height: 1;
            }
            .widget-area-rightbar .widget-title1 {
                padding: 10px 18px 10px;
            }

        </style>

        <div class="col-md-12">
            <h3 class="widget-title">ข่าวสาร ทช.</h3>
                        <hr style="    margin-top: 10px; margin-bottom: 0px;">
        </div>

        <dir class="col-md-9" style="margin-top: 1px;">

            <div class="sidebar-tabing" style="padding-left: 35px; padding-right: 20px;">

                <?php foreach($rs as $rowArticle) { ?>

                                    <div class="media"> 
                                        <a href="<?php echo base_url('publicRelations/content/' . $rowArticle['id']); ?>"> 
                                            <img class="d-flex mr-3" src="<?php echo base_url('assets/admin/blog/'.$rowArticle['Thumbnail_Url']) ?>" style="float:left;">
                                        </a>
                 <div class="media-body" style="padding-left: 10px">
                                        <div class="news-title">
                        <a href="<?php echo base_url('publicRelations/content/' . $rowArticle['id']); ?>" class="media-news">
                        <?php echo $rowArticle["Title_a"] ?>
                            
                        </a>
                                        </div>
    <div class="news-auther">
        <span class="time">
            <i class="fa fa-clock-o"></i> 
            <?php echo date("d-m-Y", strtotime($rowArticle['Publish_Date'])); ?>, 
            <i class="fa fa-folder-o"></i> <?php if($rowArticle['FK_Article_Category'] == 1){
                ?>
                ข่าวสาร
             <?php
             }else{
                ?>
                บทความ
                <?php
            }

            ?> </span>
        </div>

                                       <div style="margin-top: 5px; margin-bottom: 10px; "><?=mb_substr(strip_tags($rowArticle['Content']),0,400,'UTF-8')?>... </div> 
                                        <div class="textwidget-more" style="float: right; font-size: 14px; bottom: 0px"><a href="<?php echo base_url('publicRelations/content/' . $rowArticle['id']); ?>" class="btn btn-default btn-xs">อ่านต่อ... <i class="fa fa-arrow-right"></i></a></div>
                                    </div>
                                  </div>

                     <?php } ?>      

                      <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
                          </div>
                          
            
        </dir>

        <div class="col-md-3">
            <div class="widget-area-rightbar">
                <div class="widget_categories tab-pane">
                    <h1 class="widget-title1">Most Viewed</h1>

                    <ul style="list-style: none;">
                        

                <?php if(count($rs_view) != 0){ ?>
                    <?php foreach($rs_view as $row) { ?>
                        <li class="cat-item cat-item-1 current-cat">
                               <a title="" style="line-height: 1;" href="<?php echo base_url('publicRelations/content/' . $row['id']); ?>">
         <i class="fa fa-caret-right bullet"></i> <?php echo $row["Title_a"]  ?>
                                                                 
                               </a>
                         </li>

                         <?php } ?> 
                <?php } ?>


                    </ul>
                </div>
            </div>

           
            

        </div>

   
</div>
</div>

