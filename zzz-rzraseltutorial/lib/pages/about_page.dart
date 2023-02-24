import "package:flutter/material.dart";

class AboutPage extends StatelessWidget {
  const AboutPage({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Center(
      child: Container(
        child: const Text(
          "About Page",
          style: TextStyle(
            fontSize: 30.0,
          ),
        ),
      ),
    );
  }
}
