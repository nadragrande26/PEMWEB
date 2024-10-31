import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'mainscreen.dart';
import 'web_view_screen.dart';


class NewsScreen extends StatelessWidget {
  final HomeController homeController = Get.find<HomeController>();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Berita'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Obx(() {
          return ListView.builder(
            itemCount: homeController.news.length,
            itemBuilder: (context, index) {
              var newsItem = homeController.news[index];
              return Card(
                elevation: 4,
                margin: const EdgeInsets.symmetric(vertical: 8),
                child: ListTile(
                  title: Text(newsItem['title']),
                  onTap: () {
                    Get.to(() => WebViewScreen(url: newsItem['url']));
                  },
                ),
              );
            },
          );
        }),
      ),
    );
  }
}
