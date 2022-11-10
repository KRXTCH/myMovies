function Register() {
  return (
    <section id="Register">
        <h2 className="section_title">Inscription</h2>
      <form>
        <div className="register_container">
          <input
            type="text"
            placeholder="Jean"
            name="firstname"
            required
          ></input>
          <input
            type="text"
            placeholder="Dupont"
            name="lastname"
            required
          ></input>
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

export default Register;
