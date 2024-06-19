<?php

// Define the quiz questions and correct answers
$quizQuestions = [
    [
        "question" => "What does HTML stand for?",
        "choices" => [
            "Hyperlinks and Text Markup Language",
            "Hyper Text Markup Language",
            "Hyper Text Making Language",
            "Hyper Text Mark Language"
        ],
        "correct_answer" => 1
    ],
    [
        "question" => "What does CSS stand for?",
        "choices" => [
            "Colorful StyleSheet",
            "Creative Style Sheet",
            "Cascading Style Sheet",
            "Computer Style Sheet"
        ],
        "correct_answer" => 2
    ],
    [
        "question" => "Which HTML tag is used to define an internal style sheet?",
        "choices" => [
            "<script>",
            "<style>",
            "<html>",
            "<svg>"
        ],
        "correct_answer" => 1
    ],
    [
        "question" => "Which is the correct CSS syntax?",
        "choices" => [
            "body{color:black}",
            "{body{color:black}",
            "body={color:black}",
            "body:color{black}"
        ],
        "correct_answer" => 0
    ],
    [
        "question" => "What is the capital of lebanon?",
        "choices" => [
            "Paris",
            "Beirut",
            "/Kfardebyen",
            "Kfour"
        ],
        "correct_answer" => 1
    ],
    [
        "question" => "what is the largest planet in the solar system",
        "choices" => [
            "earth",
            "jupiter",
            "uranus",
            "mars"
        ],
        "correct_answer" => 2
    ],
    [
        "question" => "Which property is used to change the background color?",
        "choices" => [
            "backgroundColor",
            "BgColor",
            "Color-Background",
            "background"
        ],
        "correct_answer" => 3
    ],
    [
        "question" => "How to write an IF statement in JavaScript?",
        "choices" => [
            "if i==5",
            "if(i==5)",
            "if(i==5)then",
            "if i==5 then"
        ],
        "correct_answer" => 1
    ],
    [
        "question" => "4+4=?",
        "choices" => [
            "0",
            "4",
            "8",
            "none"
        ],
        "correct_answer" => 2
    ],
    [
        "question" => "How does a WHILE loop start?",
        "choices" => [
            "while(i <= 0)",
            "while(i <= 0 i++)",
            "while i <= 0",
            "while (i++ i <= 0)"
        ],
        "correct_answer" => 0
    ]
];

// Process the submitted answers
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = isset($_POST["answer"]) ? $_POST["answer"] : null;
    $question_number = isset($_POST["question_number"]) ? $_POST["question_number"] : null;
    $correctCount = 0;

    $correctAnswer = $quizQuestions[$question_number]['correct_answer'];
    if ($correctAnswer == $answer) {
        $correctCount++;
    } else {
        $correctCount = 0;
    }
    // Prepare the result data
    $resultData = [
        "correct_count" => $correctCount,
        "correct_answer" =>  $correctAnswer,
        "answer" => $answer
    ];

    // Output the result data as JSON
    header('Content-Type: application/json');
    echo json_encode($resultData);
}
