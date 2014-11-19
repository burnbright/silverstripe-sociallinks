<div class="sociallinks">
	<ul>
		<% loop SiteConfig.SocialLinks.sort(Sort) %>
		    <li class="sociallinks_network $Identifier">
				<% if URL %>
					<a class="sociallinks_link" href="$URL.URL">
				<% end_if %>
					<% if Identifier %>
						<i class="sociallinks_icon $Identifier"></i>
					<% end_if %>
					$Name
				<% if URL %>
					</a>
				<% end_if %>
			</li>
		<% end_loop %>
	</ul>
</div>