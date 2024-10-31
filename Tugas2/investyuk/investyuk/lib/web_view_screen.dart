import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';

class WebViewScreen extends StatelessWidget {
  final String url;

  WebViewScreen({required this.url});

  @override
  // ignore: non_constant_identifier_names
  Widget build(BuildContext context, dynamic WebView, dynamic JavascriptMode) {
    // Pastikan webview diinisialisasi jika belum
    if (WebView.platform == SurfaceAndroidWebView()) {
      WebView.platform = SurfaceAndroidWebView();
    }

    return Scaffold(
      appBar: AppBar(
        title: const Text('News Detail'),
      ),
      body: WebView(
        initialUrl: url,
        javascriptMode: JavascriptMode.unrestricted, // Mengizinkan JavaScript
      ),
    );
  }
}

