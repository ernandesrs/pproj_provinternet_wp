import { navigation, smoothScroll, fixedHeader } from "./essentials.js";

navigation.start('#jsNavigation', '#jsNavigationToggler', 1280);
smoothScroll.start();
fixedHeader.start('#jsHeader', '#top');