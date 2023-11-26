# Narou share

* Narou shareはweb小説のブックマークを作成し共有するサービスです。
* 他ユーザーのブックマークから新しいweb小説と出会い、自分のお気に入りのweb小説の管理も可能です。

***

1. [URL](https://github.com/Sora0702/narou_share/blob/main/README.md#url)
2. [DEMO](https://github.com/Sora0702/my_favorite_light_nevel/blob/main/README.md#demo)
3. [Features](https://github.com/Sora0702/my_favorite_light_nevel/blob/main/README.md#features)
4. [Technology](https://github.com/Sora0702/my_favorite_light_nevel/blob/main/README.md#technology)
5. [Functions](https://github.com/Sora0702/my_favorite_light_nevel/blob/main/README.md#functions)
6. [ER diagram](https://github.com/Sora0702/my_favorite_light_nevel/blob/main/README.md#er-diagram)
7. [Future features](https://github.com/Sora0702/my_favorite_light_nevel/blob/main/README.md#future-features)
8. [License](https://github.com/Sora0702/my_favorite_light_nevel/blob/main/README.md#license)

# URL
http://ec2-18-183-107-135.ap-northeast-1.compute.amazonaws.com/

# DEMO

![okinove](https://github.com/Sora0702/my_favorite_light_nevel/assets/124307131/62de158d-cd52-443b-bd90-fdb253a07e53)

# Features

本アプリの作成の経緯について、新しい本を探すときに商業本とweb小説のレビューが同時に確認できるようなサービスが見当たらないためです。
商業本のユーザーとweb小説のユーザーが触れ合う機会を作ることでより、より読書の幅が広がると考えました。

本アプリの特徴は、通常の商業本とweb小説について感想の共有やお気に入りの登録ができることです。
これにより、商業本やweb小説のどちらか一方であったユーザーが新しい作品に出会える機会を提供します。
また、お気に入り機能により好きな商業本とweb小説の管理が可能であり、それぞれ作品のページへのリンクが存在するため、容易に確認することができます。

# Technology

* Ruby 3.2.1
* Ruby on Rails 6.1.7.3
* heroku
* AWS(IAM, S3)
* RSpec
* Rakuten API
* なろう小説API

# Functions

* ユーザー登録、編集、削除機能
* ログイン、ログアウト機能(devise)
* 楽天apiとなろう小説apiを使った小説の検索機能
* 感想投稿と削除機能(Ajax)
* お気に入り機能(Ajax)
* お気に入り確認機能

# ER diagram
<img width="1348" alt="ER diagram" src="https://github.com/Sora0702/my_favorite_light_nevel/assets/124307131/d302660a-18c8-4586-a105-df5c0ed9a6f2">

# Future features
今後、下記の機能の追加を目指しています。

* おすすめ機能（閲覧している作品をお気に入り登録しているユーザーがお気に入り登録している作品の提示）
* 小説家になろう以外のweb小説サービスの導入
* 他のユーザーへのお気に入り作品の公開機能と公開非公開の選択機能

# License

[MIT License](https://opensource.org/license/mit/)
