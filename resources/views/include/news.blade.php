<div class="overlap-container">
<div class="ticker-container">
    <div class="ticker">
        <div class="title">
            <h5>Update</h5>
        </div>
        <div class="news">
            
            <marquee behavior="" direction="">
                @foreach($news as $item)
                
                <span>{{ $item->content }}</span> <!-- Display content from each news item -->
                @endforeach     
            </marquee>
        </div>
    </div>
</div>
    
</div>