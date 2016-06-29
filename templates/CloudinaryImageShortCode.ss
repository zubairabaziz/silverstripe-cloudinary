<figure class="inline-image" itemscope itemtype="http://schema.org/ImageObject">
    <img class="inline-image__img" src="$URL" alt="$AltText" itemprop="contentUrl" />
    <% if $Credit || $Caption %>
        <figcaption class="inline-image__meta">
            <% if $Credit %><span itemprop="credit" class="inline-image__credit">$Credit</span><% end_if %>
            <% if $Caption %><span itemprop="caption" class="inline-image__caption">$Caption</span><% end_if %>
        </figcaption>
    <% end_if %>
</figure>