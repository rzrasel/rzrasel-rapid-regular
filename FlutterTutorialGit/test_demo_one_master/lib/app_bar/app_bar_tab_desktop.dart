import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:scrollable_positioned_list/scrollable_positioned_list.dart';

import '../animations/entrance_fader.dart';
import '../utility/constants.dart';
import 'nav_bar_logo.dart';

class AppBarTabDesktop extends StatelessWidget implements PreferredSizeWidget {
  final ItemScrollController itemScrollController;

  const AppBarTabDesktop({required this.itemScrollController, Key? key})
      : super(key: key);

  @override
  Size get preferredSize => const Size.fromHeight(100);

  @override
  Widget build(BuildContext context) {
    //Widget getAppBar() {
    return AppBar(
      toolbarHeight: 100,
      elevation: 0.0,
      backgroundColor: Colors.white,
      title: Row(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        children: [
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: Row(
              children: [
                MaterialButton(
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(10),
                    side: const BorderSide(color: Color(0xFFEFDA74)),
                  ),
                  onPressed: () => {},
                  child: Text(
                    "App Bar Text",
                    style: GoogleFonts.montserrat(
                      color: kPrimaryColor,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 16),
                  child: MaterialButton(
                    color: const Color(0xFFEFDA74),
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(5.0),
                      side: const BorderSide(color: Color(0xFFEFDA74)),
                    ),
                    onPressed: () => {},
                    child: Text(
                      "Rz Rasel",
                      style: GoogleFonts.montserrat(
                        color: kPrimaryColor,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                ),
                for (int i = 0; i < sectionsMenuName.length; i++)
                  _appBarActions(
                    sectionsMenuName[i],
                    i,
                  ),
                const EntranceFader(
                    duration: Duration(seconds: 1),
                    offset: Offset(0, -20),
                    delay: Duration(seconds: 3),
                    child: NavBarLogo()),
              ],
            ),
          ),
        ],
      ),
    );
  }

  Widget _appBarActions(String childText, int index) {
    return EntranceFader(
      offset: const Offset(0, -20),
      delay: const Duration(seconds: 2),
      duration: const Duration(seconds: 1),
      child: Padding(
        padding: const EdgeInsets.all(8.0),
        child: MaterialButton(
          onPressed: () => _scroll(index),
          child: Text(
            childText,
            style: TextStyle(
              color: kPrimaryColor,
              fontWeight: FontWeight.bold,
            ),
          ),
        ),
      ),
    );
  }

  void _scroll(int i) {
    itemScrollController.scrollTo(index: i, duration: const Duration(seconds: 1));
  }
}
