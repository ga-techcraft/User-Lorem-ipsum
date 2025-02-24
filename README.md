# USER-LOREM-IPSUM

## 目次
1. [概要](#概要)
2. [機能](#機能)
3. [セットアップ](#セットアップ)
4. [使い方](#使い方)

## **概要**
**USER-LOREM-IPSUM** は、PHP を使用してレストランチェーンとその店舗情報、従業員データを動的に生成し、Web 上で表示するプロジェクトです。Faker ライブラリを用いてランダムなデータを生成し、Bootstrap によるスタイリングを行っています。

## **機能**
- ダミーデータの生成（レストランチェーン、店舗、従業員）
- データのオブジェクト指向管理（Company, RestaurantChain, RestaurantLocation, User, Employee）
- Bootstrap を使用した UI 表示
- 動的なアコーディオン UI による店舗情報の開閉

## **セットアップ**
### 1. リポジトリのクローン
```sh
git clone https://github.com/your-repo/user-lorem-ipsum.git
cd user-lorem-ipsum
```

### 2. 依存関係のインストール
Composer を使用して依存関係をインストールします。
```sh
composer install
```

### 3. ローカルサーバーの起動
```sh
php -S localhost:8000
```
ブラウザで `http://localhost:8000` にアクセスしてください。

## **使い方**
1. `index.php` を実行すると、ランダムに生成されたレストランチェーンの情報が表示されます。
2. アコーディオンをクリックすると、各店舗の情報が展開されます。
3. 各店舗の従業員リストも表示されます。