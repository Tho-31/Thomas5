<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Invaders</title>
    <style>
        canvas {
            background: #000;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <canvas id="gameCanvas" width="800" height="600"></canvas>
    <script>
        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');

        // Joueur
        const player = {
            x: canvas.width / 2 - 15,
            y: canvas.height - 50,
            width: 30,
            height: 30,
            speed: 5,
            color: '#00FF00'
        };

        // Projectiles
        const projectiles = [];

        // Ennemis
        const enemies = [];
        const enemyWidth = 40;
        const enemyHeight = 40;
        const enemyPadding = 20;
        const enemyRows = 4;
        const enemyCols = 8;

        for (let r = 0; r < enemyRows; r++) {
            for (let c = 0; c < enemyCols; c++) {
                enemies.push({
                    x: c * (enemyWidth + enemyPadding) + 30,
                    y: r * (enemyHeight + enemyPadding) + 30,
                    width: enemyWidth,
                    height: enemyHeight,
                    color: '#FF0000'
                });
            }
        }

        // Contrôles
        let rightPressed = false;
        let leftPressed = false;

        document.addEventListener('keydown', keyDownHandler);
        document.addEventListener('keyup', keyUpHandler);

        function keyDownHandler(e) {
            if (e.key === 'Right' || e.key === 'ArrowRight') {
                rightPressed = true;
            } else if (e.key === 'Left' || e.key === 'ArrowLeft') {
                leftPressed = true;
            } else if (e.key === ' ') {
                shoot();
            }
        }

        function keyUpHandler(e) {
            if (e.key === 'Right' || e.key === 'ArrowRight') {
                rightPressed = false;
            } else if (e.key === 'Left' || e.key === 'ArrowLeft') {
                leftPressed = false;
            }
        }

        function shoot() {
            projectiles.push({
                x: player.x + player.width / 2 - 2,
                y: player.y,
                width: 4,
                height: 10,
                speed: 7,
                color: '#FFFF00'
            });
        }

        function drawPlayer() {
            ctx.fillStyle = player.color;
            ctx.fillRect(player.x, player.y, player.width, player.height);
        }

        function drawProjectiles() {
            ctx.fillStyle = '#FFFF00';
            projectiles.forEach((projectile, index) => {
                ctx.fillRect(projectile.x, projectile.y, projectile.width, projectile.height);
                projectile.y -= projectile.speed;

                if (projectile.y < 0) {
                    projectiles.splice(index, 1);
                }
            });
        }

        function drawEnemies() {
            enemies.forEach(enemy => {
                ctx.fillStyle = enemy.color;
                ctx.fillRect(enemy.x, enemy.y, enemy.width, enemy.height);
            });
        }

        function detectCollisions() {
            projectiles.forEach((projectile, pIndex) => {
                enemies.forEach((enemy, eIndex) => {
                    if (projectile.x < enemy.x + enemy.width &&
                        projectile.x + projectile.width > enemy.x &&
                        projectile.y < enemy.y + enemy.height &&
                        projectile.y + projectile.height > enemy.y) {

                        projectiles.splice(pIndex, 1);
                        enemies.splice(eIndex, 1);
                    }
                });
            });
        }

        function update() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            if (rightPressed && player.x < canvas.width - player.width) {
                player.x += player.speed;
            } else if (leftPressed && player.x > 0) {
                player.x -= player.speed;
            }

            drawPlayer();
            drawProjectiles();
            drawEnemies();
            detectCollisions();

            requestAnimationFrame(update);
        }

        update();
    </script>
</body>
</html>
