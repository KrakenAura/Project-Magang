<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/view-berita.css')}}">
    <title>View berita</title>
</head>

<body>
    <nav id="hamburger-nav">
        <img class="logo" src="{{ asset('images/logo tvd.png') }}" alt="">
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span class="menu-text" onclick="toggleMenu()">Menu</span>
            <div class="menu-links">
                <li><a href="#about" onclick="toggleMenu()">About</a></li>
                <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
                <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
                <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
            </div>
        </div>
    </nav>
    <div class="news-img">
        <section class="news-image">
            <img src="{{asset('images/news 1.png')}}" alt="News Image">
        </section>
    </div>
    <div class="title">
        <div class="tagline">Berita Populer</div>
        <div class="news-title">Tim Volly Desa Pesanggrahan Lolos ke Final Kapolres Cup</div>
    </div>
    <div class="news-container">
        <div class="column column-left">
            <section class="news-content">
                <div class="metadata">
                    <h5>admin</h5>
                    <h5>12th July, 2024 </h5>
                </div>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel urna at sapien facilisis bibendum. Curabitur hendrerit eros vitae dui fermentum, a varius felis consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel urna at sapien facilisis bibendum. Curabitur hendrerit eros vitae dui fermentum, a varius felis consequat.</p>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
            </section>
        </div>
        <div class="column column-right">
            <div class="news-card">
                <div class="news-card-content">
                    <p class="kategori">Berita Lainya</p>
                    <img src="{{asset('images/news 1.png')}}" alt="News Image" class="news-card-image">
                    <div class="news-footer">
                        <span>Admin</span>
                        <span> . 12th July, 2024</span>
                    </div>
                    <a href="#" class="news-card-title">TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</a>
                </div>
            </div>
            <div class="news-card">
                <div class="news-card-content">
                    <img src="{{asset('images/news 3.png')}}" alt="News Image" class="news-card-image">
                    <div class="news-footer">
                        <span>Admin</span>
                        <span> . 12th July, 2024</span>
                    </div>
                    <a href="#" class="news-card-title">KERJA BAKTI GUGUR GUNUNG SUSUK WANGAN SERENTAK DI DESA PESANGGRAHAN</a>
                </div>
            </div>
        </div>
        <div class="comment-section">
            <h2>Comments</h2>
            <div class="comment-form">
                <h3>Leave a Comment</h3>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="comment-author">Name:</label>
                        <input type="text" id="comment-author" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="comment-text">Comment:</label>
                        <textarea id="comment-text" name="comment" rows="4" required></textarea>
                    </div>
                    <button type="submit">Submit Comment</button>
                </form>
            </div>
            <div class="comment-list">
                <div class="comment">
                    <div class="comment-details">
                        <div class="comment-author-wrapper">
                            <img src="{{asset('images/logo tvd.png')}}" alt="Profile Picture" class="comment-profile-image">
                            <div class="comment-author-info">
                                <div class="comment-author">John Doe</div>
                                <div class="comment-date">12th July, 2024</div>
                            </div>
                        </div>
                        <div class="comment-content">This is a great article! Thanks for sharing.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-baru">
        <p class="kategori">Berita Lainya</p>
        <div class="news-baru-list">
            <div class="news-baru-list">
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}" alt="News Image">
                    </div>
                    <div class="news-footer">
                        <span>Admin</span>
                        <span> . 12th July, 2024</span>
                    </div>
                    <div class="article">
                        <h4>Tim Volly Desa Pesanggrahan Lolos ke Final Kapolres Cup</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}" alt="News Image">
                    </div>
                    <div class="news-footer">
                        <span>Admin</span>
                        <span> . 12th July, 2024</span>
                    </div>
                    <div class="article">
                        <h4>Tim Volly Desa Pesanggrahan Lolos ke Final Kapolres Cup</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}" alt="News Image">
                    </div>
                    <div class="news-footer">
                        <span>Admin</span>
                        <span> . 12th July, 2024</span>
                    </div>
                    <div class="article">
                        <h4>Kerja Bakti Gugur Gunung Susuk Wangan Serentak Di Desa Pesanggrahan</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}" alt="News Image">
                    </div>
                    <div class="news-footer">
                        <span>Admin</span>
                        <span> . 12th July, 2024</span>
                    </div>
                    <div class="article">
                        <h4>Kerja Bakti Gugur Gunung Susuk Wangan Serentak Di Desa Pesanggrahan</h4>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    </div>
</body>

<footer>
    <div class="column left-column">
        <div class="left-card">
            <h3>Komunitas Informasi Masyarakat Kota Batu</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
        </div>
    </div>
    <div class="column center-column">
        <div class="mid-card">
            <h3>Another Section</h3>
            <p>Additional content for the center column. You can put any information or links here.</p>
        </div>
    </div>
    <div class="column right-column">
        <div class="right-card">
            <h3>Contact Information</h3>
            <p>Address: 1234 Street Name, City, Country. Phone: (123) 456-7890. Email: info@example.com.</p>
        </div>
    </div>
</footer>

</html>