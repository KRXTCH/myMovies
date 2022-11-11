import { Breadcrumbs } from "@mui/material";
import { Link } from "react-router-dom";

function Login() {
  return (
    <section id="Login">
      <Breadcrumbs className="breadcrumb" aria-label="breadcrumb">
        <Link to="/">
          Accueil
        </Link>
        <p>Connexion</p>
      </Breadcrumbs>
      <h2 className="section_title">Connexion</h2>
      <form>
        <div className="login_container">
          <input
            type="text"
            placeholder="mymovies@movies.com"
            name="username"
            required
          ></input>
          <input
            type="password"
            placeholder="monmotdepasse"
            name="password"
            required
          ></input>
          <button type="submit">Connexion</button>
        </div>
      </form>
    </section>
  );
}

export default Login;