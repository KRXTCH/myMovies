import "./Header.css";
import { Link } from "react-router-dom";

function Header() {
  function toggle(){
    document.getElementsByClassName("container")[0].classList.toggle("change");
    document.getElementsByClassName("nav_container")[0].classList.toggle("enable");
  }

  return (
    <header className="App-header">
      <div className="container" onClick={() => toggle()}>
        <div className="bar1"></div>
        <div className="bar2"></div>
        <div className="bar3"></div>
      </div>
      <div className="nav_container">
        <nav id="nav_menu">
          <ul>
            <li>
              <Link to="/" onClick={() => toggle()}>Accueil</Link>
            </li>
            <li>
              <Link to="/connexion" onClick={() => toggle()}>Connexion</Link>
            </li>
            <li>
              <Link to="/inscription" onClick={() => toggle()}>Inscription</Link>
            </li>
            <li>
              <Link to="/qui-sommes-nous" onClick={() => toggle()}>Qui sommes nous ?</Link>
            </li>
          </ul>
        </nav>
      </div>
    </header>
  );
}

export default Header;