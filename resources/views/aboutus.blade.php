@extends('layouts.app')

@section('content')
<div class="about">
<p>Welcome to Bookopolis,</p> <p>your ultimate destination for efficient ebook management. At Bookopolis,
     we are passionate about connecting readers with an
     extensive library of ebooks, carefully curated to cater to diverse tastes and preferences. 
    Our platform offers a wide selection of both premium and non-premium books, ensuring
     there's something for everyone.</p>
<p>
    For those seeking premium content, we provide an exclusive subscription service. 
    With a subscription fee of just 200 Rupees for a 30-day access period, readers
     gain unrestricted entry to our premium ebook collection, which includes bestsellers, rare finds, 
     and exclusive titles. We understand the importance of choice and flexibility, 
     which is why our subscription is designed to be easily renewable, ensuring that you 
     can continue to enjoy uninterrupted access to premium books even after your initial subscription period ends.</p>
    
  <p>  At Bookopolis, we are committed to enhancing your reading experience by offering
    
    an extensive library, convenient subscription options, and a user-friendly platform. 
    Our mission is to foster a vibrant reading community and empower book enthusiasts to explore,
     discover, and immerse themselves in the world of literature. Thank you for choosing Bookopolis
      as your go-to destination for ebooks, and we look forward to being your trusted partner
      on your literary journey.

</p>
</div>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
}

/* header {
    background-color: #007BFF;
    color: #fff;
    padding: 20px 0;
    text-align: center;
} */

.about {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h1 {
    font-size: 28px;
    text-align: center;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    line-height: 1.6;
    text-align: justify;
}
</style>
@endsection
