# VCCW Gulp Example

VCCWでWordPress環境を用意しWordPressのテーマをGulpでコーディングするフォーマット。

## 各種バージョン

| name | varsion |
|------|---------|
| [node.js](https://nodejs.org/ja/) | v5.10.0 |
| [ruby](https://www.ruby-lang.org/ja/) | 2.3.1 |
| [vccw](http://vccw.cc/) | 2.21.0 |
| [Vagrant](https://www.vagrantup.com/) | 1.8.1 |
| [WordPress](https://ja.wordpress.org/) | 日本語パッケージ最新版 |

## 初期プラグイン

| プラグイン名 | 説明 |
|-----|-----|
| [Advanced Custom Fields](https://ja.wordpress.org/plugins/advanced-custom-fields) | Customise WordPress with powerful, professional and intuitive fields |
| [All in One SEO Pack](https://ja.wordpress.org/plugins/all-in-one-seo-pack) | One of the most downloaded plugins for WordPress (over 30 million downloads since 2007). Use All in One SEO Pack to automatically optimize your site f |
| [Contact Form 7](https://ja.wordpress.org/plugins/contact-form-7) | お問い合わせフォームプラグイン。シンプル、でも柔軟。 |
| [WP Multibyte Patch](https://ja.wordpress.org/plugins/wp-multibyte-patch) | 日本語版パッケージのためのマルチバイト機能の拡張。 |
| [Disable Comments](https://ja.wordpress.org/plugins/disable-comments) | 管理者がサイト全体でコメントを無効化できるようにします。コメントは投稿タイプに基づいて無効化できます。マルチサイト対応。 |

## 初期の投稿タイプ

| 投稿名 | 投稿タイプ | 投稿ID |
|-----|------|-----|
| ニュース | post | post |
| ページ | page | page |
| よくある質問 | post | faq |


## Gulp

- Bootstrap4
- sass
- browserify + babel
- browser-sync
- css autoprefixer

## デフォルトユーザー

| name | data |
|---|---|
| admin_user | uuuuuuuuuuer |
| admin_pass | xxxxxxxxxxxx |
| admin_email |  example@example.com |


## セットアップ

1. リポジトリをクローン
```
$ git clone git@github.com:naoshiro/vccw-gulp-example.git
```
- ディレクトリ移動
```
$ cd vccw-gulp-exampl
```
- 必要に応じてsite.yml、gulpfile.jsを編集＆設定 [OPTION]
```
$ vi site.yml
$ vi gulpfile.js
$ vi package.json
```
- npm パッケージインストール
```
$ npm install
```
- テーマファイルビルド
```
$ gulp build
```
- 仮想サーバー立ち上げ
```
$ vagrant up
```
- 開発環境立ち上げ＆srcフォルダ監視と自動ビルド
```
$ gulp dev
```
- URL
    - [管理画面](http://vccw-gulp-example.dev/wp-admin)
    - [フロント画面](http://localhost:3000)
