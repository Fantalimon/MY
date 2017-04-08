<?php

session_start();

$visitor_count=0;
$last_visit=date('d.m.Y H:i:s',time());

if( isset($_COOKIE['visitor_count'])){$visitor_count = $_COOKIE['visitor_count'];}
if( isset($_COOKIE['last_visit'])){$last_visit = $_COOKIE['last_visit'];}

$visitor_count++;

if( $last_visit !== time())
{
    setcookie('last_visit', $last_visit ,time() + 3600);
}

setcookie('visitor_count',$visitor_count, time() + 3600);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        div.container {
            width: 100%;
            border: 1px solid gray;
        }
        header, footer {
            padding: 1em;
            color: white;
            background-color: #0791c7;
            clear: left;
            text-align: center;
        }
        header {
            text-align: left;
        }
        header a {
            color: white;
            text-decoration: none;
        }
        nav {
            float: left ;
            max-width: 160px;
            margin: 0;
            padding: 25px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            padding-bottom: 20px;
        }
        nav ul a {
            text-decoration: none;
        }
        article {
            margin-left: 170px;
            border-left: 1px solid gray;
            padding: 1em;
            overflow: hidden;
        }
    </style>
</head>
<body>
<?php
$id='';
if(!empty($_GET))
{$id=empty($_GET['id'])?'':trim(strip_tags($_GET['id']));}
$blocks = ['header', 'content', 'footer'];
?>
<div class="container">
<?php foreach ($blocks as $block): ?>
<?php if ($block == 'header'): ?>
<?php include 'header.php' ?>
<?php elseif ($block == 'content'): ?>
    <?php  include 'menu.php'?>
            <article>
<?php
                switch ($id)
                {
                    case 'multi':
                        include 'multi.php';
                        break;
                    case 'calc':
                        include 'calc.php';
                        break;
                        
                        case 'quiz':
//                        include "quiz_cookies/index_quiz.php";
                        include "quiz_session/index_quiz.php";
                        break;
                        
                        case 'Users':
                        include "all_users.php";
                        break;
                    default:
                        include 'defalt.php';
                        break;
                }
               ?>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis semper sem. Suspendisse non justo quis nisl pulvinar venenatis. Nulla ut nisl eu mauris consequat convallis nec et orci. Maecenas porttitor nec erat sed dapibus. Nulla augue libero, tincidunt eget interdum in, tincidunt et odio. Mauris vel est a est ultricies posuere. Sed consectetur magna ac malesuada dictum. Nam facilisis turpis quam, ac pretium magna rhoncus a. Integer bibendum, purus sit amet efficitur placerat, magna eros mollis leo, non tempor urna ligula malesuada mi. Mauris gravida sollicitudin eleifend.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis semper sem. Suspendisse non justo quis nisl pulvinar venenatis. Nulla ut nisl eu mauris consequat convallis nec et orci. Maecenas porttitor nec erat sed dapibus. Nulla augue libero, tincidunt eget interdum in, tincidunt et odio. Mauris vel est a est ultricies posuere. Sed consectetur magna ac malesuada dictum. Nam facilisis turpis quam, ac pretium magna rhoncus a. Integer bibendum, purus sit amet efficitur placerat, magna eros mollis leo, non tempor urna ligula malesuada mi. Mauris gravida sollicitudin eleifend.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis semper sem. Suspendisse non justo quis nisl pulvinar venenatis. Nulla ut nisl eu mauris consequat convallis nec et orci. Maecenas porttitor nec erat sed dapibus. Nulla augue libero, tincidunt eget interdum in, tincidunt et odio. Mauris vel est a est ultricies posuere. Sed consectetur magna ac malesuada dictum. Nam facilisis turpis quam, ac pretium magna rhoncus a. Integer bibendum, purus sit amet efficitur placerat, magna eros mollis leo, non tempor urna ligula malesuada mi. Mauris gravida sollicitudin eleifend.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mattis semper sem. Suspendisse non justo quis nisl pulvinar venenatis. Nulla ut nisl eu mauris consequat convallis nec et orci. Maecenas porttitor nec erat sed dapibus. Nulla augue libero, tincidunt eget interdum in, tincidunt et odio. Mauris vel est a est ultricies posuere. Sed consectetur magna ac malesuada dictum. Nam facilisis turpis quam, ac pretium magna rhoncus a. Integer bibendum, purus sit amet efficitur placerat, magna eros mollis leo, non tempor urna ligula malesuada mi. Mauris gravida sollicitudin eleifend.</p>
            </article>
    <?php elseif ($block == 'footer'): ?>
    <?php include 'footer.php' ?>
    <?php endif; ?>
<?php endforeach; ?>
</div>
</body>
</html>
