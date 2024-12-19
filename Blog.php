<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="home2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.8;
            margin: 0;
            padding: 0;
        }
        .content {
            padding: 40px;
            width: 94.5%;
            background-color: rgb(255, 247, 214);
        }
        .content h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .content h2, .content h3 {
            color: #444;
            margin-top: 25px;
        }
        .content p {
            font-size: 1.2rem;
            color: #555;
            text-align: justify;
            margin-top: 15px;
        }
        .content hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 30px 0;
        }
        .blog-posts {
            margin-top: 20px;
        }
        .blog-post {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .blog-post h3 {
            margin-bottom: 10px;
            font-size: 1.8rem;
            color: #333;
        }
        .blog-post p {
            font-size: 1rem;
            color: #666;
        }
    </style>
</head>
<body>
    <section class="content">
        <h1>Welcome to Our Blog</h1>
        <p>
            Dive into the world of pet adoption, care, and heartwarming stories from our community. Our blog 
            serves as a hub for pet lovers, offering expert tips, inspiring adoption journeys, and updates on 
            our efforts to provide loving homes for pets in need.
        </p>

        <hr>

        <h2>Featured Posts</h2>
        <div class="blog-posts">
            <div class="blog-post">
                <h3>1. The Joy of Adopting: How a Pet Can Transform Your Life</h3>
                <p>
                    Adopting a pet is not just about giving an animal a home—it’s about creating a bond that 
                    lasts a lifetime. Read inspiring stories of families who found unconditional love and happiness 
                    through pet adoption.
                </p>
            </div>
            <div class="blog-post">
                <h3>2. Top Tips for First-Time Pet Owners</h3>
                <p>
                    Are you bringing a furry friend home for the first time? Learn essential tips and tricks to 
                    ensure a smooth transition for your new companion. From setting up your home to understanding 
                    pet behavior, we’ve got you covered.
                </p>
            </div>
            <div class="blog-post">
                <h3>3. Senior Pets: Why They Make Wonderful Companions</h3>
                <p>
                    Senior pets are often overlooked, but they have so much love to give. Discover why adopting 
                    an older pet could be the perfect choice for your family.
                </p>
            </div>
            <div class="blog-post">
                <h3>4. Celebrating Success: Tales of Happy Adoptions</h3>
                <p>
                    Every adoption is a success story. Explore heartwarming tales of pets who found their forever 
                    homes and the families who welcomed them with open arms.
                </p>
            </div>
        </div>

        <hr>

        <h2>Join the Conversation</h2>
        <p>
            Our blog is a place to connect, share, and learn. Whether you're an experienced pet owner or new to the 
            world of adoption, there’s always something for everyone. We invite you to contribute by sharing your 
            own stories, asking questions, or simply spreading the love for animals.
        </p>

        <hr>

        <h2>Stay Updated</h2>
        <p>
            Don’t miss out on the latest posts, updates, and events from our pet adoption community. Follow us on 
            social media and subscribe to our newsletter to stay connected.
        </p>
    </section>
</body>
<?php include 'footer.php'; ?>
</html>
