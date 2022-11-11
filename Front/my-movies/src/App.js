import "./App.css";
import Header from "./components/Header";
import Home from "./components/Home";
import {
  BrowserRouter as Router,
  Route,
  Routes,
} from "react-router-dom";
import Login from "./components/Login";
import Register from "./components/Register";
import FilmDetails from "./components/FilmDetails";
import LegalNotice from "./components/LegalNotice";
import PlaylistDetail from "./components/PlaylistDetail";

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
          <Route excat path="/mentions-légales" element={<LegalNotice />}></Route>
          <Route exact path="/film/filmId=:filmId" element={<FilmDetails></FilmDetails>}></Route>
          <Route exact path="/playlist/detail" element={<PlaylistDetail />}></Route>
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
