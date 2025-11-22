<?php
if (isset($_SESSION['flash_message'])):
    
    $message = $_SESSION['flash_message'];
    $type = $message['type'] === 'error' ? 'error' : 'success';
    $text = htmlspecialchars($message['message']);
    
    unset($_SESSION['flash_message']);
?>

<div id="flash-message" class="flash-<?= $type ?>">
    <p><?= $text ?></p>
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    
    <div class="progress-bar-container">
        <div class="progress-bar progress-<?= $type ?>"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashElement = document.getElementById('flash-message');
        
        if (flashElement) {
            const displayTime = 5000; 
            
            setTimeout(function() {
                flashElement.style.opacity = '0';
                
                setTimeout(function() {
                    flashElement.style.display = 'none';
                }, 500); 

            }, displayTime);
        }
    });
</script>

<style>
    #flash-message {
        position: fixed;
        padding: 15px;
        margin: 20px;
        border-radius: 15px;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        opacity: 1; 
        transition: opacity 0.5s ease-out; 
        overflow: hidden;
        z-index: 8;
        min-width: 1300px;
        left: 50%;
        transform: translateX(-50%);
    }
    
    .flash-error {
        background-color: #e01b24;
        border: 1px solid #c9302c;
    }
    .flash-success {
        background-color: #28a745;
        border: 1px solid #1e7e34;
    }
    .close-btn {
        cursor: pointer;
        font-weight: bold;
        font-size: 1.2em;
        margin-left: 10px;
        z-index: 10;
    }

    .progress-bar-container {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        height: 100%;
        width: 100%;
        animation: deplete-progress 5s linear forwards; 
        transition: background-color 0.5s;
    }

    .progress-bar.progress-success {
        background-color: rgba(255, 255, 255, 0.5);
    }
    .progress-bar.progress-error {
        background-color: rgba(255, 255, 255, 0.5);
    }

    @keyframes deplete-progress {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
</style>

<?php endif; ?>