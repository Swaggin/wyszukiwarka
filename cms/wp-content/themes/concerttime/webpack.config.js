const path = require('path');

module.exports = {
  mode: 'development',
  // watch: true,
  entry: {
    bundle: path.resolve(__dirname, './src/js/main.js'),
  },
  output: {
    path: path.resolve(__dirname, 'public/dist'),
    filename: '[name].js',
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: ['style-loader', 'css-loader', 'sass-loader'],
      },
    ],
  },
}