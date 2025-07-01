<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu d'Échecs</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        #chessboard {
            display: grid;
            grid-template-columns: repeat(8, 60px);
            grid-template-rows: repeat(8, 60px);
            gap: 0;
        }
        .square {
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            cursor: pointer;
        }
        .white {
            background-color: #f0d9b5;
        }
        .black {
            background-color: #b58863;
        }
    </style>
</head>
<body>
    <div id="chessboard"></div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chessboard = document.getElementById('chessboard');
            const letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
            const numbers = [8, 7, 6, 5, 4, 3, 2, 1];

            // Initialisation de l'échiquier
            for (let i = 0; i < 8; i++) {
                for (let j = 0; j < 8; j++) {
                    const square = document.createElement('div');
                    square.classList.add('square');
                    square.classList.add((i + j) % 2 === 0 ? 'white' : 'black');
                    square.dataset.row = i;
                    square.dataset.col = j;
                    chessboard.appendChild(square);
                }
            }

            // Position initiale des pièces
            const initialPosition = [
                ['♜', '♞', '♝', '♛', '♚', '♝', '♞', '♜'],
                ['♟', '♟', '♟', '♟', '♟', '♟', '♟', '♟'],
                ['', '', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
                ['', '', '', '', '', '', '', ''],
                ['♙', '♙', '♙', '♙', '♙', '♙', '♙', '♙'],
                ['♖', '♘', '♗', '♕', '♔', '♗', '♘', '♖']
            ];

            // Placer les pièces sur l'échiquier
            const squares = document.querySelectorAll('.square');
            squares.forEach((square, index) => {
                const row = Math.floor(index / 8);
                const col = index % 8;
                if (initialPosition[row][col]) {
                    square.textContent = initialPosition[row][col];
                }
            });

            // Gestion des clics pour déplacer les pièces
            let selectedSquare = null;

            squares.forEach(square => {
                square.addEventListener('click', () => {
                    if (selectedSquare) {
                        // Déplacer la pièce
                        square.textContent = selectedSquare.textContent;
                        selectedSquare.textContent = '';
                        selectedSquare.classList.remove('selected');
                        selectedSquare = null;
                    } else if (square.textContent) {
                        // Sélectionner la pièce
                        selectedSquare = square;
                        square.classList.add('selected');
                    }
                });
            });
        });
    </script>
</body>
</html>
