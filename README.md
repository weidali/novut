1. Install this apk and get the fcm token inside - для того что бы получать тестовые notification на тестовом устройстве
2. Config the FCM provider on Novu
3. Create a template, add push notification (`'api/notifications-groups'`, `'api/create-template'`)
5. Create PHP/rest api for test(need api token) - вот можно попробовать PHP NOVU
6. Create a subscriber and assign the fcm token (`'create-subscriber'`, `'update-subscriber-credentials'`)
7. Trigger a template (`'trigger-event'`)