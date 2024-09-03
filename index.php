<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHmongLabs</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            margin: 0;
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 2em;
            background-color: #f0f0f0;
            background-image: 
                linear-gradient(#e6e6e6 1px, transparent 1px),
                linear-gradient(90deg, #e6e6e6 1px, transparent 1px);
            background-size: 20px 20px;
            overflow: hidden;
        }
        .notebook-page {
            background-color: white;
            padding: 20px 40px;
            border-radius: 0 5px 5px 0;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: absolute;
            cursor: move;
            user-select: none;
        }
        .notebook-page::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #ff9999;
        }
        .pop-up {
            animation: popUp 0.5s ease-out;
            color: #333;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }
        @keyframes popUp {
            0% { transform: scale(0); opacity: 0; }
            80% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="notebook-page">
        <?php
        $text = "AHmongLabs";
        echo "<div class='pop-up'>$text</div>";
        ?>
    </div>

    <script>
        const notebookPage = document.querySelector('.notebook-page');
        let isDragging = false;
        let startX, startY, initialX, initialY;

        notebookPage.addEventListener('mousedown', startDragging);
        document.addEventListener('mousemove', drag);
        document.addEventListener('mouseup', stopDragging);

        function startDragging(e) {
            isDragging = true;
            startX = e.clientX - notebookPage.offsetLeft;
            startY = e.clientY - notebookPage.offsetTop;
        }

        function drag(e) {
            if (!isDragging) return;
            e.preventDefault();
            const newX = e.clientX - startX;
            const newY = e.clientY - startY;
            notebookPage.style.left = `${newX}px`;
            notebookPage.style.top = `${newY}px`;
        }

        function stopDragging() {
            isDragging = false;
        }

        // Initial position
        notebookPage.style.left = '50%';
        notebookPage.style.top = '50%';
        notebookPage.style.transform = 'translate(-50%, -50%)';
    </script>
</body>
</html>