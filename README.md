# 類人猿 Snow Monkeyスキン LPパターン用
LPパターン（R002）向けのSnow Monkeyスキンです

## このプラグイン動作の前提条件
- Snow Monkeyテーマがインストールされてない環境では動きません

# SCSSのコンパイル方法
当プラグインディレクトリーまで移動したあと、

- npm i でpackegeをインストール
- npm run watch でSCSSファイルの修正を常時監視（SCSSを修正したら即時CSSにコンパイルしてくれる）
- npm run build でCSSにコンパイル（コマンド走ったときだけCSSをコンパイル）

## composerのインストール方法
当プラグインディレクトリーまで移動したあと、

- composer install でパッケージをインストール

# 変更履歴
## 1.9.2
- 1.9.1で指定したスリム幅のサイズ指定の単位をemからremに変更
## 1.9.1
- Snow Monkey v19.1.5の仕様変更に伴いsingleページのスリム幅指定の調整
## 1.9.0
- Snow Monkey v19・Snow Monkey Blocks v18の対応
- Nodeパッケージの更新
## 1.8.0
- Yarnをv1からv3にアップグレード
- 更新アラートボックスメッセージ表示機能を追加
## 1.7.0
- node.jsパッケージのアップグレード
- GitHub Acitionsの調整
## 1.6.0
- wp-env環境の導入
- BackstopJSの導入

## 1.5.0
- アーカイブページ 投稿一覧のスタイルをパターン集側から引っ張る形に修正
- singleページ 関連記事パーツの上マージンのスタイルが効いてない不具合の対応
- README.mdのコマンド表記間違えの修正
- プラグインの情報追加（autoupdate）

## 1.4.0
- gulpでのコンパイルを廃止し、dart-scss・webpackで各種コンパイルを行う方式に変更
- バージョン番号の修正（2桁繰り上げなど）

## 0.0.1.3
- composerパッケージのアップデート
- PR作成時に行うプラグインのバージョン番号取得の仕組みを変更

## 0.0.1.2
- CSSのキャッシュ依存を軽減させるためCSSファイルパスにパラメータ付与

## 0.0.1.1
- スリム幅テンプレート表示崩れ対応
- GitHub Actions用テンプレートファイル修正

## 0.0.1.0
- 製品版リリース
