<?php

curl -i -X GET \
    "https://graph.facebook.com/oauth/access_token?
        grant_type=fb_exchange_token&
        client_id={app-id}&
        client_secret={app-secret}&
        fb_exchange_token={user-short-lived-token}"
		
		?>