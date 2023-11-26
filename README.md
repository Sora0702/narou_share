# Narou share

* Narou shareはweb小説のブックマークを作成し共有するサービスです。
* 他ユーザーのブックマークから新しいweb小説と出会い、自分のお気に入りのweb小説の管理も可能です。

***

1. [URL](https://github.com/Sora0702/narou_share/blob/main/README.md#url)
2. [Features](https://github.com/Sora0702/narou_share/blob/main/README.md#features)
3. [Technology](https://github.com/Sora0702/narou_share/blob/main/README.md#technology)
4. [Functions](https://github.com/Sora0702/narou_share/blob/main/README.md#functions)
5. [ER diagram](https://github.com/Sora0702/narou_share/blob/main/README.md#er-diagram)
6. [Future features](https://github.com/Sora0702/narou_share/blob/main/README.md#future-features)
7. [License](https://github.com/Sora0702/narou_share/blob/main/README.md#license)

# URL
http://ec2-18-183-107-135.ap-northeast-1.compute.amazonaws.com/

# Features

本アプリの作成の経緯について、近年動画サイトや音楽サイトではユーザー間で再生リストやプレイリストが公開されており、そういったところから新しいものに出会えることがあります。
そこで自分が好きなweb小説の分野でもそういったユーザー間でお気に入りの共有するサービスを作りたいと考えました。

本アプリの特徴は、小説家になろうサイトのweb小説についてお気に入りの登録とその共有ができることです。
公式サイトでは、ブックマークを１０種類作成できますが、本サービスでは制限なくブックマークタグが作成可能です。
また、作成したブックマークタグは他ユーザーが検索可能となり、他ユーザーのブックマークタグをお気に入り登録することも可能です。

# Technology

* PHP 8.1
* Laravel 9.52.16
* MySQL 8.0(データベース)
* nginx(webサーバー)
* tailwindcss(フロントエンド)
* AWS(EC2)
* なろう小説API

# Functions

* ユーザー登録、編集、削除機能、ログイン、ログアウト機能(Laravel Breeze)
* なろう小説apiを使った小説の検索機能
* apiで検索した小説のCRUD機能
* ブックマークを分類するためのタグCRUD機能
* 他ユーザーのブックマークタグ検索機能（新旧、人気順でソート可）
* 他ユーザーのタグお気に入り機能
* 人気上位４つまでをおすすめとして表示する機能

# ER diagram
<img width="1348" alt="ER diagram" src="https://github.com/Sora0702/narou_share/assets/124307131/1ef6a72d-6efb-4c28-9ee4-ce2b50628ce6">

# Future features
今後、下記の機能の追加を目指しています。

* 他ユーザーのお気に入り機能を非動機通信で実装
* 他のユーザーへのお気に入り作品の公開機能と公開非公開の選択機能

# License

[MIT License](https://opensource.org/license/mit/)
