import "package:flutter/material.dart";
import 'package:rzraseltutorial/widgets/app_navigation_bar.dart';

class AppView extends StatelessWidget {
  final Widget child;
  const AppView({required this.child, Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Column(
        children: [
          const AppNavigationBar(),
          Expanded(child: child),
        ],
      ),
    );
  }
}
