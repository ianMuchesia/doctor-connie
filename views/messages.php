<section class="section-dashboard">
    <div class="head-title">
        <div class="left">
            <h1>Messages</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="" href="#">Messages</a>
                </li>
            </ul>
        </div>
       
      
    </div>
    <h1><?php echo count($messages);?> Total Messages</h1>
    <div class="message-container">
       <?php foreach($messages as $message):?>

        <div class="message">
            <div class="message-header">
                <div class="message-header-left">
                    
                    
                    <h5> <span>Name: </span><?php echo $message['name'];?></h5>
                    <h5><span>Email: </span><?php echo $message['email'];?></h5>
                </div>
                <div class="message-header-right">
                    
                    <h5><span>Date: </span> <?php echo $message['date'];?></h5>
                </div>
            </div>
            <div class="message-body">
                <p><?php echo $message['message'];?></p>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</section>