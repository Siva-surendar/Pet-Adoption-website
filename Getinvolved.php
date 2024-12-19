<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Involved</title>
    <link rel="stylesheet" href="home2.css">
    <style>
        /* Inline styles for better readability and alignment */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.8;
            margin: 0;
            padding: 0;
        }
        .content {
            margin: 0;
            padding: 40px 60px;
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
            margin-top: 35px;
        }
        .content p, .content ul {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #555;
            text-align: justify;
        }
        .content ul {
            list-style-type: disc;
            margin-left: 50px;
        }
        .content hr {
            border: none;
            border-top: 2px solid #ddd;
            margin: 30px 0;
        }
        .content .get-involved-options {
            margin-top: 40px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        .content .get-involved-options div {
            flex: 1;
            min-width: 300px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }
        .content .get-involved-options div:hover {
            transform: translateY(-10px);
        }
        .content .get-involved-options div h3 {
            margin-bottom: 15px;
            font-size: 1.7rem;
            color: #333;
        }
        .content .get-involved-options div p {
            font-size: 1rem;
            color: #666;
        }
    </style>
</head>
<body>
    <section class="content">
        <h1>Get Involved</h1>
        <p>
            Welcome to the Get Involved page! Here, we believe that every individual can make a difference in the lives 
            of animals in need. Whether you have time to volunteer, resources to donate, or simply the will to advocate 
            for better lives for pets, your involvement matters. Join our mission to rescue, rehabilitate, and rehome 
            animals in need.
        </p>

        <hr>

        <h2>Why Get Involved?</h2>
        <p>
            Supporting our mission goes beyond helping pets; it's about building a community where compassion and care 
            lead the way. By getting involved, you can:
        </p>
        <ul>
            <li><strong>Save Lives:</strong> Each action helps us provide essential care to animals in need, from medical 
                treatments to finding forever homes.</li>
            <li><strong>Spread Awareness:</strong> Educate others about the importance of adoption and responsible 
                pet ownership.</li>
            <li><strong>Create Impact:</strong> Make a tangible difference in reducing pet homelessness and improving 
                their well-being.</li>
        </ul>

        <hr>

        <h2>Ways to Get Involved</h2>
        <div class="get-involved-options">
            <div>
                <h3>Volunteer</h3>
                <p>
                    Be a hero to pets in need by volunteering your time. Whether it’s feeding, grooming, or helping 
                    organize adoption events, your support makes a world of difference.
                </p>
            </div>
            <div>
                <h3>Donate</h3>
                <p>
                    Your donations help us provide food, shelter, and medical care for our pets. A small contribution 
                    can create a big impact on their lives.
                </p>
            </div>
            <div>
                <h3>Foster</h3>
                <p>
                    Provide temporary homes to pets who need love and care until they find their forever families. 
                    Fostering saves lives and prepares pets for adoption.
                </p>
            </div>
            <div>
                <h3>Advocate</h3>
                <p>
                    Use your voice to raise awareness about adoption, responsible pet ownership, and the challenges 
                    faced by shelter animals.
                </p>
            </div>
        </div>

        <hr>

        <h2>Be a Part of Change</h2>
        <p>
            Every step you take helps transform the lives of pets and creates a ripple effect of kindness and compassion. 
            When you choose to get involved, you’re not just helping animals—you’re becoming a part of a community that 
            values love, respect, and dedication to making the world a better place for all creatures.
        </p>

        <hr>

        <h2>Join Us Today</h2>
        <p>
            Ready to make a difference? Whether you volunteer, foster, donate, or advocate, your support helps us 
            continue our mission of providing better lives for pets in need. Take the first step today—let’s work 
            together to ensure every animal has the love and care they deserve.
        </p>
    </section>
</body>
<?php include 'footer.php'; ?>
</html>
