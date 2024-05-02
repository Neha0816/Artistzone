<!DOCTYPE html>
<html>
    <head>
        <title>footer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .footer{
			padding : 40px 0;
			background-color: #fa4a6f;
		}

		.footer .social{
			text-align: center;
			padding-bottom: 20px;
			color: #fff;
		}

		.footer .social a{
			font-size: 24px;
			color : inherit;
			border : 1px solid #c9c9c9;
			width: 40px;
			height: 40px;
			line-height: 38px;
			display :inline-block;
			text-align: center;
			border-radius: 50%;
			margin: 0 8px;
			opacity: 0.75;
		}

		.footer .social a:hover{
			opacity: 0.9;
		}

		.footer ul{
			margin-top: 0;
			padding: 0;
			list-style: none;
			font-size: 18px;
			line-height: 1.6;
			margin-bottom: 0;
			text-align: center;
		}

		.footer ul a{
			color: inherit;
			text-decoration: none;
			opacity: 0.8;
			
		}

		.footer ul li{
			display: inline-block;
			padding: 0 15px;
		}

		.footer ul li a:hover{
			opacity: 1;
			border-bottom: 2px solid wheat;
		}

		.footer .copyright{
			margin-top: 15px;
			text-align: center;
			font-size: 13px;
			color: #aaa;
			font-weight : bold;
		}
		/* Responsive Styling */

    /* Small screens */
    @media (max-width: 576px) {
        .footer .social {
            padding-bottom: 10px;
        }

        .footer .social a {
            width: 30px;
            height: 30px;
            line-height: 28px;
            font-size: 20px;
        }

        .footer ul {
            font-size: 16px;
        }

        .footer ul li {
            padding: 0 10px;
        }
    }

    /* Medium screens */
    @media (min-width: 577px) and (max-width: 767px) {
        .footer .social a {
            width: 35px;
            height: 35px;
            line-height: 33px;
            font-size: 22px;
        }

        .footer ul {
            font-size: 17px;
        }

        .footer ul li {
            padding: 0 12px;
        }
    }

    /* Large screens */
    @media (min-width: 768px) {
        .footer .social a {
            width: 40px;
            height: 40px;
            line-height: 38px;
            font-size: 24px;
        }

        .footer ul {
            font-size: 18px;
        }

        .footer ul li {
            padding: 0 15px;
        }
    }

	.icons {
    text-align: center;
    margin-top: 10px;
	}

	.icons img {
		width: 40px;
		height: 40px;
		border-radius: 50%;
		margin: 0 8px;
		
	}

	.icons img:hover {
		opacity: 0.9;
	}

	/* Responsive Styling */
	@media (max-width: 576px) {
		.icons img {
			width: 30px;
			height: 30px;
			margin: 0 5px;
		}
	}

	@media (min-width: 577px) and (max-width: 767px) {
		.icons img {
			width: 35px;
			height: 35px;
			margin: 0 6px;
		}
	}

	@media (min-width: 768px) {
		.icons img {
			width: 60px;
			height: 60px;
			margin: 0 8px;
		}
	}
    </style>
    </head>

<footer class="footer">
    <div class="social">
        <a href="#"><i class="fa fa-instagram" ></i></a>
        <a href="#"><i class="fa fa-snapchat" ></i></a>
        <a href="#"><i class="fa fa-twitter" ></i></a>
        <a href="#"><i class="fa fa-facebook" ></i></a>
    </div>
    <div class="icons">
        <a href="makeup.php"><img src="images/makeup_logo1.jpg" alt="Image 1" class="round-icon"></a>
        <a href="mehendi.php"><img src="images/mehendi_logo1.jpg" alt="Image 2" class="round-icon"></a>
        <a href="nail_art.php"><img src="images/nail_logo1.jpg" alt="Image 3" class="round-icon"></a>
    </div>
	<br>
    <ul class="list">
        <li>
            <a href="makeup.php">Home</a>
        </li>
        <li>
            <a href="about.php">About</a>
        </li>
        <li>
            <a href="mailto: nehabhandari0044@gmail.com?subject=Query&body=Message">Contact Us</a>
        </li>
    </ul>
	
    <p class="copyright">
        Copyright © 2023 Artistzone. All rights reserved
    </p>
</footer>