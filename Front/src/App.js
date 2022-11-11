import { BrowserRouter as Router, Route, Routes } from "react-router-dom";

import Home from "./components/Home";
import Header from "./components/Header";
import Login from "./components/auth/Login";
import Register from "./components/auth/Register";
import LegalNotice from "./components/LegalNotice";
import FilmDetails from "./components/movies/FilmDetails";
import PlaylistDetail from "./components/playlists/PlaylistDetail";

function App() {
  return (
    <div className="App">
      <Router>
        <Header></Header>
        <Routes>
          <Route exact path="/" element={<Home></Home>} />
          <Route exact path="/connexion" element={<Login></Login>}></Route>
          <Route
            exact
            path="/inscription"
            element={<Register></Register>}
          ></Route>
          <Route
            excat
            path="/mentions-légales"
            element={<LegalNotice />}
          ></Route>
          <Route
            exact
            path="/film/filmId=:filmId"
            element={<FilmDetails></FilmDetails>}
          ></Route>
          <Route
            exact
            path="/playlist/detail"
            element={<PlaylistDetail />}
          ></Route>
        </Routes>
      </Router>
      <script
        defer
        type="text/javascript"
        src="../src/js/toggleNav.js"
      ></script>
    </div>
  );
}

export default App;
