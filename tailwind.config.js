module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  theme: {
      extend: {
          colors: {
              primary: "#1E293B",
              secondary: "#FACC15",
              textPrimary: "#FFFFFF",
              textSecondary: "#1E293B",
          }
      },
  },
  plugins: [
      require('flowbite/plugin')
  ],
};
