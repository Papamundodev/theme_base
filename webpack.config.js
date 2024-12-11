const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const fs = require('fs');

module.exports = {
  entry: {
    'main': './assets/js/main.js',
  },

  watch: false,
  mode: 'development',
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
      chunkFilename: '[id].css'
    }),
    {
      apply: (compiler) => {
        compiler.hooks.done.tap('WriteHashPlugin', (stats) => {
          const compilationStatus = {
            hash: stats.hash,
            timestamp: new Date().getTime()
          };
          
          fs.writeFileSync(
            path.join(__dirname, 'assets/build/compilation-status.json'),
            JSON.stringify(compilationStatus)
          );
        });
      }
    }
  ],
  output: {
    path: path.resolve(__dirname, 'assets/build'),
    assetModuleFilename: '../fonts/[hash][ext][query]'
  },
  module: {
    rules: [
      {
        test: /\.(scss|css)$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              implementation: require('sass')
            }
          }
        ],
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [{
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }]
      },
      {
        test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        type: "asset/resource",
        generator: {
          filename: '../fonts/[hash][ext][query]'
        }
      }
    ],
  },
}
