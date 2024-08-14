@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/view-berita.css')}}">
@endsection



@section('content')

<div class="news-img">
    <section class="news-image">
        <img src="{{ asset('storage/' . $berita->image) }}" alt="News Image">
    </section>
</div>
<div class="title">
    <div class="tagline">{{ $berita->category }}</div>
    <div class="news-title">{{ $berita->title }}</div>

    <div class="social-share">
        <button onclick="copyLink()" class="share-button copy-link">
            <i class="fas fa-link"></i> Copy Link
        </button>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-button facebook">
            <i class="fab fa-facebook-f"></i> Share
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->title) }}" target="_blank" class="share-button twitter">
            <i class="fab fa-twitter"></i> Tweet
        </a>
        <a href="https://wa.me/?text={{ urlencode($berita->title . ' ' . request()->fullUrl()) }}" target="_blank" class="share-button whatsapp">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>

    </div>
</div>
<div class="news-container">
    <div class="column column-left">
        <section class="news-content">
            <div class="metadata">
                <h5>{{ $berita->author }}</h5>
                <h5>{{ $berita->date->format('jS F, Y') }}</h5>
            </div>
            <hr>
            {!! $berita->description !!}
        </section>
    </div>
    <div class="column column-right">
        @foreach ($latestNews as $news)
        <div class="news-card">
            <div class="news-card-content">
                <div class="news-card-image-wrapper">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{$news->title}}" class="news-card-image">
                </div>
                <div class="news-card-text-wrapper">

                    <a href="{{ route('berita.view', $berita->id) }}" class="news-card-title">{{ $berita->title }}</a>
                    <div class="news-footer">
                        <span>{{$news->author}}</span>
                        <span> . {{ $news->date->format('jS F, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <!-- Cody -->
    <div class="comment-section">
        @auth
        <div class="comment-form">
            <h3>Leave a Comment</h3>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="news_id" value="{{ $berita->id }}">
                <div class="form-group">
                    <label for="comment-text">Comment:</label>
                    <textarea id="comment-text" name="content" rows="4" required></textarea>
                </div>
                <button type="submit">Submit Comment</button>
            </form>
        </div>
        @else
        <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
        @endauth



        <div class="comment-list">
            @foreach($comments as $comment)
            <div class="comment">
                <div class="comment-details">
                    <div class="comment-author-wrapper">
                        <img src="{{asset('images/logo tvd.png')}}" alt="Profile Picture" class="comment-profile-image">
                        <div class="comment-author-info">
                            <div class="comment-author">{{ $comment->user->name }}</div>
                            <div class="comment-date">{{ $comment->created_at->format('d M, Y') }}</div>
                            <button class="reply-button" data-comment-id="{{ $comment->id }}">Reply</button>
                        </div>
                    </div>
                    <div class="comment-content">{{ $comment->content }}</div>
                </div>

                <div id="reply-form-{{ $comment->id }}" class="reply-form">
                    <form action="{{ route('comments.reply', $comment->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <textarea name="content" rows="2" required></textarea>
                        <button type="submit">Submit Reply</button>
                    </form>
                </div>
                @foreach($comment->replies as $reply)
                <div class="reply">
                    <div class="comment-author">{{ $reply->author }}</div>
                    <div class="comment-date">{{ $reply->created_at->format('d M, Y') }}</div>
                    <div class="comment-content">{{ $reply->content }}</div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>

</div>
<div class="news-baru">
    <div class="berita-lainnya">
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

    </div>
    <hr>
</div>
</div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const replyButtons = document.querySelectorAll('.reply-button');
        replyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                const form = document.getElementById('reply-form-' + commentId);
                form.style.display = form.style.display === 'none' ? 'block' : 'none';
            });
        });
    });

    function copyLink() {
        var dummy = document.createElement('input');
        var text = window.location.href;

        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);

        alert('Link copied to clipboard!');
    }
</script>
@endsection


</html>